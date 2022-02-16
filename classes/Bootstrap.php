<?php

class Bootstrap
{
    private $controller;
    private $action;
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
        if($this->request['controller'] === '') {
            $this->controller = 'home';
        } else {
            $this->controller = $this->request['controller'];
        }
        if($this->request['action'] === null) {
            $this->action = 'index';
        } else {
            $this->action = $this->request['action'];
        }
    }

    public function createController()
    {
        // Check Class
        if(class_exists($this->controller)) {
            $parents = class_parents($this->controller);
            if(in_array("Controller", $parents)) {
                if(method_exists($this->controller, $this->action)) {
                    return new $this->controller($this->action, $this->request);
                } else {
                    // Method Does Not Exist
                    echo '<h1>Method does not exist</h1>';
                    return null;
                }
            } else {
                // Base Controller Does Not Exist
                echo '<h1>Base controller not found</h1>';
                return null;
            }
        } else {
            // Controller Class Does Not Exist
            echo '<h1>Controller class does not exist</h1>';
            return null;
        }
    }
}