<?php
class DatabaseConnector
{
  private $host;
  private $username;
  private $password;
  private $database;

  public function __construct($host, $username, $password, $database)
  {
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->database = $database;
  }

  public function connect()
  {
    $connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
    }
    return $connection;
  }
}

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "password";
$dbName = "Bookmundi";

$database = new DatabaseConnector($dbHost, $dbUsername, $dbPassword, $dbName);
$connection = $database->connect();
