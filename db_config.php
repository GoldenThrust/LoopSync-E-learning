<?php
session_start();
// create,update,delete,select,insert
class database
{
  private $host = "localhost";
  private $username = "root";
  private $password = "";
  private $database = "loopsync";
  public $conn;
  public function __construct()
  {
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }
  public function sec($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = $this->conn->real_escape_string($data);
    return $data;
  }
  public function create($table, $data) // function to inset into database table
  {
    $columns = implode(', ', array_keys($data));
    $placeholders = implode(", ", array_fill(0, count($data), '?'));
    $sql = "INSERT INTO $table ($columns)
    VALUES ($placeholders)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param(str_repeat("s", count($data)), ...array_values($data));
    $stmt->execute();
    return $this->conn->insert_id;
  }

  public function read($table, $condition = '') // function to select from table.
  {
    if ($condition !== '') {
      $cond = ' WHERE ' . $condition;
    } else {
      $cond = '';
    };
    $sql = "SELECT * FROM $table" . $cond;
    $result = $this->conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC); // the data selected will be return by the function. You can use the function as the array of data returned.
  }
  public function update($table, $data, $condition) // function to update the database table
  {
    $set = '';
    $values = array();
    foreach ($data as $key => $value) {
      $set .= "$key = ?, ";
      $values[] = $value;
    }
    $set = rtrim($set, ', ');
    $sql = "UPDATE $table SET $set WHERE $condition";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param(str_repeat("s", count($values)), ...$values);
    $stmt->execute();
  }
  public function delete($table, $condition) // function to delete from database
  {
    $sql = "DELETE FROM $table WHERE $condition";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return 1;
  }
  public function __destruct()
  {
    $this->conn->close();
  }
}
$database = new database();
