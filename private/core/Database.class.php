<?php
class Database
{
  private $stmt;
  private $db;
  private $table;

  public function __construct(String $table)
  {
    $this->table = $table;
    $this->db = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    try {
      $this->db = new PDO($this->db, DB_USER, DB_PASS, [
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function query($query): void
  {
    $this->stmt->prepare($query);
  }

  public function execute(): void
  {
    $this->stmt->execute();
  }

  public function rowCount(): int
  {
    $this->execute();
    return $this->stmt->rowCount();
  }

  public function resultSet(): array
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function bind($param, $value, $type = null): void
  {
    switch (is_null($type)) {
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

  public function sanitizeHtml(array $data): array
  {
    $cleanData = [];
    foreach ($data as $key => $value) {
      $cleanData[$key] = htmlspecialchars($value);
    }
    return $cleanData;
  }


  /*
      CRUD FUNCTION
  */
  public function insertData(array $data): bool
  {
    $i = 1;
    $cleanData = $this->sanitizeHtml($data);
    $query = 'INSERT INTO :table SET';

    foreach ($cleanData as $key => $val) {
      if ($i === count($cleanData)) $query .= $key;
      else {
        $query .= ' :' . $key . ',';
        $i++;
      }
    }
    $this->query($query);
    $this->stmt->bindValue(':table', $this->table);
    foreach ($cleanData as $key => $val) {
      $this->bind($key, $val);
    }

    if ($this->rowCount > 0) return true;
    return false;
  }

  public function getData(array $options = null): array
  {
    $query = 'SELECT * FROM :table';
    if (!is_null($options)) $query .= ' WHERE :by = :value';
    $this->query($query);
    $this->stmt->bindValue(':table', $this->table);
    $this->stmt->bindValue(':by', $options['by']);
    $this->bind(':value', $options['value']);
    return $this->resultSet();
  }

  public function deleteData(array $options): bool
  {
    $query = 'DELETE FROM :table WHERE :by = :value';
    $this->stmt->bindValue(':table', $this->table);
    $this->stmt->bindValue(':by', $options['by']);
    $this->bind(':value', $options['value']);

    if ($this->rowCount > 0) return true;
    return false;
  }

  public function updateData(array $data): bool
  {
    $i = 1;
    $cleanData = $this->sanitizeHtml($data);
    $query = 'INSERT INTO :table SET';

    foreach ($cleanData as $key => $val) {
      if ($i === count($cleanData)) $query .= $key;
      else {
        $query .= ' :' . $key . ',';
        $i++;
      }
    }
    $this->query($query);
    $this->stmt->bindValue(':table', $this->table);
    foreach ($cleanData as $key => $val) {
      $this->bind($key, $val);
    }

    if ($this->rowCount > 0) return true;
    return false;
  }
}
