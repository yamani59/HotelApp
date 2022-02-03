<?php
class Controller {
  protected function model(string $model) :object {
    require_once "private/modules/" . $model . ".class.php";
    return new $model;
  }

  protected function view(string $view, array $data = null) :void {
    require_once "private/views/" . $view . ".php";
  }
}