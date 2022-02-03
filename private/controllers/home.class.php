<?php
/* class for visiotor page */

class Home extends Controller {
  private $navbar = [];

  public function __construct() {
    $this->navbar = [
      'home' =>BASEURL . 'home',
      'kamar' => BASEURL . 'home/kamar',
      'fasilitas' => BASEURL . 'home/fasilitas'
    ];
  }

  public function index() :void {
    if ($_SERVER['REQUES_METHOD'] == 'POST') {
      $currentData = $_POST;
      array_walk($currentData, function($item, $key) {

      });
    }

    $this->view('template/top', $this->navbar);
    $this->view('home/home');
    $this->view('template/bottom');
  }

  public function kamar() :void {
    $getData = $this->model('room')->getData();

    $this->view('template/top', $this->navbar);
    $this->view('home/kamar', $getData);
    $this->view('template/bottom');
  }


}