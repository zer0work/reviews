<?php 
class Controller_Admin extends Controller {
	
	public function action_Index() {
		session_start();
		if(!$_SESSION["auth"]) {
			header('Location: /auth');
			exit;
		}
		$data = Model::getAll('reviews');
		$this->view->generate('admin_view.php', 'template_view.php', $data);
	}

	public function action_Moder() {
		Model_Reviews::moderReview($_GET['id'], $_GET['moder']);
		header('Location: /admin');
		exit;
	}

}
 ?>