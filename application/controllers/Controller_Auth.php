<?php 

class Controller_Auth extends Controller {

	private $form_LoginPass;

	public function __construct() {
		$this->view = new View();
		session_start();
	}

	public function getFormData() {
		if ( empty($_POST['login']) || empty($_POST['password']) ) {
			return false;
		}
		return $_POST['login'] . $_POST['password'];
	}

	public function action_Index() {
		if ($_SESSION["auth"]) {
			header('Location: /admin');
			exit;
		}

		if ( ! $form_LoginPass = $this->getFormData() ) {
			$this->view->generate('auth_view.php', 'template_view.php', $error);
			return;
		}

		if ($this->checkForm($form_LoginPass)) {
			header('Location: /admin');
			$_SESSION["auth"] = true;
			exit;
		}
		else {
			$error = 'Неправильный логин или пароль';
			$this->view->generate('auth_view.php', 'template_view.php', $error);
		}
	}

	public function checkForm($form_LoginPass) {
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