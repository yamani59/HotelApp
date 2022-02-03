<?php
class Room extends Database {
  private $table = 'room';

  public function __construct() {
    parent::__construct($this->table);
  }
}