<?php
class Database {
  private $db;
  private $stmt;
  private $table;

  public function __construct(string $table) {
    $this->table = $table;
    $this->db = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

    try {
      $this->db = new PDO($this->db, DB_USER, DB_PASS, [
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]);
    } catch(PDOException $e) {
      die($e->getMessage());
    }
  }

  public function query(string $query) :void {
    $this->stmt->prepare($query);
  }

  public function bind(string $param, $value, $type = null) :void {
    if (is_null($type))
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }

    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute() :void {
    $this->stmt->execute();
  }

  public function resultSet() :array {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function sigle() :array {
    $this->execute();
    return $this->smt->fetch(PDO::FETCH_ASSOC);
  }

  public function rowCount() :int {
    $this->execute();
    return $this->stmt->rowCount();
  }


  /*
      CRUD FUNCTION
  */
  public function getData() :array {
    $this->query('
    SELECT * FROM :table
    ');

    $this->bind("table", $this->table);
    return $this->resultSet();
  }

  public function getDataBy(string $by, $value) :array {
    $this->query('
      SELECT * FROM :table WHERE :by = :value
    ');

    $this->bind('table', $this->table);
    $this->bind('by', $by);
    $this->bind('value', $value);
    return $this->resultSet();
  }

  public function insertData(array $data) :bool {
    $this->query('
      INSERT INTO :table VALUES SET :data
    ');

    $this->bind('table', $this->table);
    $this->stmt->bindValue('data', $data);
    
    if ($this->rowCount() > 0) return true;
    return false; 
  }

  public function deleteData(string $by, $value) :bool {
    $this->query('
      DELETE FROM :table WHERE :by = :value
    ');

    $this->bind('table', $this->table);
    $this->bind('by', $by);
    $this->bind('value', $value);

    if ($this->rowCount() > 0) return true;
    return false;
  }

  public function updateData(
    array $data, 
    string $by, 
    $value) :bool {
    $this->query('
      UPDATE :table SET :data WHERE :id = :value
    ');

    $this->bind('table', $this->table);
    $this->stmt->bindValue('data', $data);
    $this->bind('id', $by);
    $this->bind('value', $value);

    if ($this->rowCount() > 0) return true;
    return false;
  }
}