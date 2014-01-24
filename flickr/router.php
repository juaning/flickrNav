<?php
	/**
	 * Router from: http://r.je/mvc-php-router-dependency-injection.html
	 */
    class Router { 
	    private $rules = array();
	    public function addRule(RouterRule $rule) { 
	        $this->rules[] = $rule; 
	    } 
	     
	    public function getRoute(array $route) { 
	        foreach ($this->rules as $rule) { 
	            if ($found = $rule->find($route)) return $found;     
	        }
	        throw new Exception('No matching route found'); 
	    } 
	} 
	
	interface RouterRule { 
	    public function find(array $route); 
	}
	
	class ConfigurationRouterRule implements RouterRule { 
	    private $dice; 
	
	    public function __construct(Dice $dice) { 
	        $this->dice = $dice; 
	    } 
	
	    public function find(array $route) { 
	        $name = '$route_' . $route[0] . '/' . $route[1];
	        //If there is no special rule set up for this $name, revert to the default 
	        if ($this->dice->getRule($name) == $this->dice->getRule('*')) { 
	            return false; 
	        } 
	        else return $this->dice->create($name);
	    } 
	}
	
	class ConventionRouterRule implements RouterRule { 
	    private $dice; 
	
	    public function __construct(Dice $dice) { 
	        $this->dice = $dice; 
	    } 
	
	    public function find(array $route) { 
	        //There's no manual configuration, fall back to the class naming convention approach
	        $className = $route[0] . $route[1];
	        $viewName = $className . 'View'; 
	
	        //Any objects requested by both the controller and view need to be shared between them
	        $shared = array();
			
	        if (class_exists($viewName)) {                  
	                $view = $this->dice->create($viewName, array(), function($args) use (&$shared) { 
	                    $shared = $args; 
	                }); 
	        } 
	        else return false; 
	        
	        //E.g. "UserEditController" 
	        $controllerName = $className . 'Controller'; 
	
	        if (class_exists($controllerName)) $controller = $this->dice->create($controllerName); 
	        else $controller = null; 
	
	        return new Route($view, $controller);     
	    } 
	}

	class DefaultRouterRule implements RouterRule { 
	    private $dice; 
	
	    public function __construct(Dice $dice) { 
	        $this->dice = $dice; 
	    } 
	
	    public function find(array $route) { 
	        return $this->dice->create('$route_default');     
	    } 
	}
?>