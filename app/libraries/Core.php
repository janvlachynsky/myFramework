<?php
/*
	APP CORE CLASS
	creates URL & load core controller
	URLFORMAT  - /controllers/method/params
	
*/

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();
        //find controller

        if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
            $this->currentController = ucwords($url[0]);

            unset($url[0]);

        }

        require_once '../app/controllers/'.$this->currentController . '.php';

        //Instantiate current controller

        $this->currentController = new $this->currentController;

        //Check for methods
        if(isset($url[1])){
            if(method_exists($this->currentController,$url[1])){
                $this->currentMethod = $url[1];
            }
            unset($url[1]);
        }

        //get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params

        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);

    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url=rtrim($_GET['url']);
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode("/", $_GET['url']);
            return $url;
        }
    }
}	

