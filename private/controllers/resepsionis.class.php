<?php
class Resepsionis extends Controller
{
  private $navbar = [];

  public function __construct()
  {
    $this->navbar = [
      'Resepsionis' => BASEURL . 'resepsionis'
    ];
  }

  public function index(): void
  {
    $getData =  $this->model('order')->getData();

    $this->view('template/top', $this->navbar);
    $this->view('resepsonis/index', $getData);
    $this->view('template/bottom');
  }

  public function cek_in($by): void
  {
    $options = [
      'by' => 'id',
      'value' => $by
    ];
    $getData = $this->model('order')->getData($options);
    $this->view('resepsonis/cekin', $getData);
  }
}
