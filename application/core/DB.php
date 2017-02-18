<?php 
  class DB {
    private $host = 'localhost';
    private $db   = 'reviewsDB';
    private $user = 'root';
    private $pass = '';
    private $opt = [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    protected $pdo;

    public function __construct() {
      $dsn = "mysql:host={$this->host};dbname={$this->db}";
      return $this->pdo = new PDO($dsn, $this->user, $this->pass, $this->opt);
    }

    public function execute($sql, $params = []) {
      $stmt = $this->pdo->prepare($sql);
      return $stmt->execute($params);
    }

    public function query($sql, $params = []) {
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($params);
      $ret = [];
      while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        $ret[] = $row;
      }
      return $ret;
    }
  }