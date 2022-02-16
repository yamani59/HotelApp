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
      'fasilitas' => BASEURL . 'home/facilities',
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
      $currentData = [
        'room_id' => intval($_POST['room_id']),
        'customer' => $_POST['customer'],
        'email' => $_POST['email'],
        'no_hp' => $_POST['no_hp'],
        'visitor' => $_POST['visitor'],
        'cek_in' => $_POST['cek-in'],
        'cek_out' => $_POST['cek-out'],
        'count_room' => intval($_POST['count_room']),
      ];

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

  public function pemesanan(): void
  {
    $getData = $this->model('room')->getData();
    $this->view('home/pemesanan', $getData);
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
    $getData = $this->model('HotelFacilities')->getData();

    $this->view('template/top', $this->navbar);
    $this->view('home/facilities', $getData);
    $this->view('template/bottom');
  }

  public function insert(): void
  {
    if ($_SERVER('REQUEST_METHOD') == 'POST') {
      $this->model('room')->insertData($_POST);
    }

    $this->view('template/top');
    $this->view('admin/tambah.php');
    $this->view('template/bottom');
  }
}
