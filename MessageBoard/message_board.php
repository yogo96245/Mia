
<?php
  include_once ('message.php');
  // 設定時區
  date_default_timezone_set("Asia/Taipei");
  session_start();

  class MessageBoard extends DB{

    var $messages = array();
    
    function __construct() {
      parent::__construct();
      $this->receiveMessage();
      $this->loadData();
      $this->showAllMessages();
      $this->showForm();
    }
    function set_token() {
      $_SESSION['token'] = md5(microtime(true));
    }
    function valid_token() {
      $return = $_REQUEST['token'] === $_SESSION['token'] ? true: false;
      $this->set_token();
      return $return;
    }
    function receiveMessage() {
      if(!isset($_SESSION['token']) || $_SESSION['token']=='') {
        $this->set_token();
      }
      if(isset($_POST['userName'])){
        if($this->valid_token()){
          $this->saveData($_POST['userName'], date ("Y-m-d H:i:s", time()), $_POST['content']); 
        }
        else{
          // 重複提交
        }
      }
      else {
      }
    }

    function saveData ($userName, $time, $content) {
      $query = "INSERT INTO `all_messages`(`name`, `time`, `content`) VALUES ('".$userName."','".$time."','".$content."')";
      $this-> database->exec ($query);
    }

    function loadData() {
      $query = "SELECT * FROM `all_messages`;";
      $result = $this->database->query ($query);
      foreach ($result as $row) {
        $message = new Message ($row['name'], $row['time'], $row['content']);
        array_push ($this->messages, $message);
      }
    }

    function showAllMessages() {
      foreach ($this->messages as $m) {
        $m->show();
      } 
    }

    function showForm() {
      echo "<form action='' method='POST'>";
      echo "Name: "."<input type='text' name='userName'> ";
      echo "Content: "."<input type='text' name='content'> ";
      echo "<input type='submit' name='submit' value='SEND'>";
      echo "<input type='hidden' name='token' value='${_SESSION['token']}'>";
      echo "</form>";
    }
  }
  $messageBoard = new MessageBoard ();
?>