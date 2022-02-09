<?php
class App
{
  protected $class = 'home';
  protected $method = 'index';
  protected $param = [];

  public function __construct()
  {
    session_start();
    $url = $this->parseUrl();

    // Class (controller class)
    if (file_exists('private/controllers/' . $url[0] . '.class.php')) {
      $this->class = $url[0];
      unset($url[0]);
    }

    // instansiasi objeck 
    require_once('private/controllers/' . $this->class . '.class.php');
    $this->class = new $this->class;

    // for check method exists or not
    if (isset($url[1]))
      if (method_exists($this->class, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }

    // for check param
    if (!empty($url))
      $this->param = array_values($url);
    call_user_func_array([$this->class, $this->method], $this->param);
  }

  public function parseUrl(): array
  {
    if (!$_GET['url']) die();
    $url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
    return explode('/', $url);
  }
}
