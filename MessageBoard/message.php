<?php
  class Message {
    var $name;
    var $time;
    var $content;

    function __construct ($name, $time, $content) {
      $this->name = $name;
      $this->time = $time;
      $this->content = $content;
    }
    function show() {
      echo "Name: ".$this->name."<br>";
      echo "Time: ".$this->time."<br>";
      echo "Content: ".$this->content."<br>";
      echo "---------------------------------------<br>";
    }
  }
  class DB {
    var $database = null;
    function __construct() {
      //connect
      $dbhost = 'mysql:host=localhost;dbname=db_messages;';
      $account = 'root';
      $password = 'Jkwad54542Jared88045';

      $this->database = new PDO ($dbhost, $account, $password);
    }

    function __destruct() {
      // disconnect
      $this->database = null;
    }
  }
?>