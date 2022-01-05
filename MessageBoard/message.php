<!DOCTYPE html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>貓兒迷雅-留言板</title>
  <link rel="stylesheet" href="message_board_style.css" type="text/css">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> 

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>
  <script src="../library.js"></script>
  <script src="../jq-multilang.js"></script>
  <link rel="icon" href="../title icon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="../title icon.ico" type="image/x-icon">
  
  <style>
     @import "../style.css";
  </style>
  
</head>
<body>
  <!--<div class="background"></div>-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="font-size: larger;">
    <a class="navbar-brand" href="../index.html">NekoMia</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link jq-multilang-gallery" 
             data-lang-zh-tw="畫廊" data-lang-en="gallery" data-lang-jp="ギャラリー"
             href="../貓兒迷雅-畫廊.html"> 畫廊 <span class="sr-only"></span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link jq-multilang-commodity" 
             data-lang-zh-tw="商品" data-lang-en="commodity " data-lang-jp="商品"
             href="../貓兒迷雅-商品.html"> 商品 
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link jq-multilang-messageboard" 
             data-lang-zh-tw="留言板" data-lang-en="message board" data-lang-jp="伝言板"
             href="message_board.php"> 留言板
          </a>
        </li>
      </ul>
    </div>
    <select onchange="mutilang(this.value)">
      <option value="zh-tw">中文(台灣)</option>
      <option value="en">English</option>
      <option value="jp">日本語</option>
    </select>
    </nav>
<?php

  echo" 
    <main class='board'>
     <div class='board__header'>
       <h1 class='board__tittle'>留言板</h1>
    </div>
    <div class=board__hr></div>
    <section>";

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
      echo" 
        <div class='card'>
          
          <div class='card__body'>
            <div class='card__info'>
              <span class='card__author'></span>
              <span class='card__time'>".$this->name." ".$this->time."</span>
            </div>
            <p class='card__content'></p>
            <h1>".$this->content."</h1>
            <p></p>
          </div>
        </div>
        <div class=board__hr></div>";
    }
  }
  class DB {
    var $database = null;
    function __construct() {
      //connect
      $dbhost = 'mysql:host=us-cdbr-east-05.cleardb.net; dbname=heroku_5e90ae2c91d8181;';
      $account = 'bbea49bf3b2653';
      $password = 'a5bfdf38';

      $this->database = new PDO ($dbhost, $account, $password);
    }

    function __destruct() {
      // disconnect
      $this->database = null;
    }
  }
?>
</body>
</html>


