<?php
/* class for admin page */

class Admin extends Controller
{
  private $navbar = [];

  public function __construct()
  {
    if (isset($_SESSION['logged'])) {
      if ($_SESSION['logged'] == 'resepsionis') {
        header('location: ' . BASEURL . 'resepsionis');
        exit();
      }
    }

    $this->navbar = [
      'kamar' => BASEURL . 'admin',
      'fasilitas kamar' => BASEURL . 'admin/fasilitas_kamar',
      'fasilitas hotel' => BASEURL . 'admin/fasilitas_hotel',
      'css' => 'admin.css'
    ];
  }

  public function index(): void
  {
    Flass::msg('SUCCES');
    if (isset($_SESSION['flass'])) {
      if ($_SESSION['flass'] == true) Flass::msg('SUCCESS');
      if ($_SESSION['flass'] == false) Flass::msg('FAILED');

      unset($_SESSION['flass']);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $currentValue = $_POST;
      array_walk($currentValue, function (&$item, $key) {
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

  public function fasilitas_kamar(): void
  {
  }

  public function fusilitas_hotel(): void
  {
  }

  public function update($by): void
  {
    if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
      header('location: ' . BASEURL . 'admin');
      exit();
    }

    $options = [
      'by' => 'id',
      'value' => $by
    ];
    $getData = $this->model('room')->getData($options)[0];

    $this->view('template/top');
    $this->view('admin/update', $getData);
    $this->view('template/bottom');
  }

  public function insert(): void
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $extension = ['png', 'jpg', 'jpeg'];
      $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

      if (!in_array($fileExtension, $extension)) {
        header('location: ' . BASEURL . '/admin');
        $_SESSION['flass'] = false;
        exit();
      }

      $currentName = bin2hex(random_bytes(8));
      $currentPath = 'private/images/' . $currentName . '.' . $fileExtension;
      move_uploaded_file($_FILES['image']['tmp_name'], $currentPath);
      $dataPost = [
        "name" => $_POST['name'],
        "room_count" => $_POST['room_count'],
        "facilities" => $_POST['facilities'],
        "image" => $currentName . '.' . $fileExtension
      ];

      if ($this->model('room')->insertData($dataPost) === true) {
        $_SESSION['flass'] = true;
        header('location: ' . BASEURL . 'admin');
        exit();
      }
      $_SESSION['flass'] = false;
      header('location: ' . BASEURL . 'admin');
      exit();
    }

    $this->view('template/top', $this->navbar);
    $this->view('admin/tambah');
    $this->view('template/bottom');
  }

  public function delete($delete): void
  {
    $option = [
      'by' => 'id',
      'value' => $delete
    ];
    $this->model('room')->deleteData($option);
    header('location: ' . BASEURL . 'admin/index');
  }
}
