<html>
<head>
<title>PHP Site</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<!-- Router -->
<?php
  class SimpleRouter {
 
    /* Routes array where we store the various routes defined. */
    private $routes;
 
    /* The methods adds each route defined to the $routes array */
    function add_route($route, callable $closure) {
        $this->routes[$route] = $closure;
    }
 
    /* Execute the specified route defined */
    function execute() {
        $path = $_SERVER['PATH_INFO'];
 
        /* Check if the given route is defined,
         * or execute the default '/' home route.
         */
        if(array_key_exists($path, $this->routes)) {
            $this->routes[$path]();
        } else {
            $this->routes['/']();
        }
    }   
  }
  
  /* Create a new router */
  $router = new SimpleRouter();
  
  /* Add a Homepage route as a closure */
  $router->add_route('/', function(){
      echo 'Hello World';
  });
  
  /* Add another route as a closure */
  $router->add_route('/greetings', function(){
      echo 'Greetings, my fellow men.';
  });
  
  /* Add a route as a callback function */
  $router->add_route('/callback', 'myFunction');
  
  
  /* Callback function handler */
  function myFunction(){
      echo "This is a callback function named '" .  __FUNCTION__ ."'";
  }
  
  
  /* Execute the router */
  $router->execute();

?>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">WebSiteName</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
    </div>
  </nav>
</body>


</html>