<?php
class App
{
    protected $controller = 'home' ;
    protected $method = 'index' ;
    protected $params = [];

    public function __construct()
    {
    
        $url = $this->parseUrl();
        // echo $url.'<br>';
        // print_r($url);

        if(file_exists('../app/controllers/'. $url[1] .'.php'))
        {
            $this->controller = $url[1];
            unset($url[1]);
        }
        require_once('../app/controllers/'.$this->controller.'.php');
        // echo $this->controller;
        $this->controller = new $this->controller;
        
        if(isset($url[2]))
        {
            if(method_exists($this->controller, $url[2]))
            {
                $this->method = $url[2];
                unset($url[2]);
                unset($url[0]);
            }
        } 

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
        // print_r($this->params);
    }

    public function parseUrl()
    {
        if(isset($_GET['url']))

        {
            // echo $_GET['url'];
            echo"<br>";
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
?> 