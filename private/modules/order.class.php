<?php
class Order extends Database {
  private $table = 'order';

  public function __construct() {
    parent::__construct($this->table);
  }
}