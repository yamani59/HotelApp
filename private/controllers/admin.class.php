<?php
/* class for admin page */

class Admin extends Controller {
  private $navbar = [];

  public function __construct() {
    if (isset($_SESSION['logged'])) {
      if ($_SESSION['logged'] == 'resepsionis') {
        header('location: ' . BASEURL . 'resepsionis');
        exit();
      }
    }

    $this->navbar = [
      'kamar' => BASEURL . 'admin',
      'fasilitas kamar' => BASEURL . 'admin/fasilitas_kamar',
      'fasilitas hotel' => BASEURL . 'admin/fasilitas_hotel'
    ];
  }

  public function index() :void {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $currentValue = $_POST;
      array_walk($currentValue, function(&$item, $key) {
        $item = filter_var($item, FILTER_SANITIZE_STRING);
      });
      
      if ($this->model('room')->insertData($currentValue)) {
        $_SESSION['flass'] = true;
        header('location: ' . BASEURL . 'admin');
        exit();
      }
    }   

    $getData = $this->model('room')->getData();

    $this->view('template/top', $this->navbar);
    $this->view('admin/kamar', $getData);
    $this->view('template/bottom');
  }

  public function fasilitas_kamar() :void {

  }

  public function fusilitas_hotel() :void {

  }

  public function update($by) :void {
    if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
      header('location: ' . BASEURL . 'admin');
      exit();
    }


    // variabel post contain key url, form and value    
    $this->view('template/update', $_POST);
  }
}