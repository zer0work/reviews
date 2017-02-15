<?php
class Controller_Main extends Controller {

	function action_Insert() {
		if( !empty($_POST['name']) || !empty($_POST['email']) || !empty($_POST['text']) ) {
			$name  = $_POST['name'];
			$email = $_POST['email'];
			$text  = $_POST['text'];

			$image = Model::saveImage();

			$model = new Model_Reviews;
			$model->addReview($name, $text, $email, $date = '', $edit = false, $image);
		}
		header('Location: /');
		exit;
	}

	function action_Index() {

		$data = Model::getAll('reviews');

		if (empty($_GET['sort'])) {
			usort($data,"Model_Reviews::sortDate");
		}
		else {
			usort($data,"Model_Reviews::sortText");
		}

		$this->view->generate('main_view.php', 'template_view.php', $data);
	}
	
}
?>