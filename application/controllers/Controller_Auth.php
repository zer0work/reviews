<?php 

class Controller_Auth extends Controller {
  private $login;
  private $pass;

  public function __construct() {
    $this->view = new View();
    session_start();
    if ( empty($_POST['login']) || empty($_POST['password']) ) {
      return false;
    }
    $this->login = $_POST['login'];
    $this->pass = $_POST['password'];
  }

  public function action_Index() {
    if ( isset($_SESSION["auth"]) && $_SESSION["auth"] ) {
      header('Location: /admin');
      exit;
    }

    $loginPass = $this->login . $this->pass;
    if ( empty($loginPass) ) {
      return $this->view->generate('auth_view.php', 'template_view.php');
    }

    if ( $this->checkForm($loginPass) ) {
      $_SESSION["auth"] = true;
      header('Location: /admin');
      exit;
    }
    else {
      $error = 'Неправильный логин или пароль';
      $this->view->generate('auth_view.php', 'template_view.php', $error);
    }
  }

  private function checkForm($form_LoginPass) {
    $auth = new Model_Auth($form_LoginPass);
    if ($auth->check()) {
      return true;
    }
    else {
      return false;
    }
  }

  public function action_LogOut() {
    unset($_SESSION["auth"]);
    header('Location: /auth');
  }
}


?>