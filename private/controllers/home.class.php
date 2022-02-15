<?php
/* class for visiotor page */

class Home extends Controller
{
  private $navbar = [];

  public function __construct()
  {
    $this->navbar = [
      'home' => BASEURL . 'home',
      'kamar' => BASEURL . 'home/kamar',
      'fasilitas' => BASEURL . 'home/fasilitas'
    ];
  }

  public function index(): void
  {
    if (isset($_SESSION['flass'])) {
      if ($_SESSION['flass'] === false) Flass::msg('failed');
      else Flass::msg('success');

      unset($_SESSION['flass']);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $currentData = $_POST;
      array_walk($currentData, function (&$item, $key) {
        $item = filter_var($item, FILTER_SANITIZE_STRING);
      });

      if ($this->model('order')->insertData($currentData)) {
        $_SESSION['flass'] = true;
        header('location: ' . BASEURL . 'home');
        exit();
      }

      $_SESSION['flass'] = false;
      header('location: ' . BASEURL . 'home');
      exit();
    }

    $this->view('template/top', $this->navbar);
    $this->view('home/home');
    $this->view('template/bottom');
  }

  public function kamar(): void
  {
    $getData = $this->model('room')->getData();

    $this->view('template/top', $this->navbar);
    $this->view('home/kamar', $getData);
    $this->view('template/bottom');
  }

  public function facilities(): void
  {
    $getData = $this->model('hotel_facilities')->getData();

    $this->view('template/top', $this->navbar);
    $this->view('home/facilities', $getData);
    $this->view('template/bottom');
  }
}
