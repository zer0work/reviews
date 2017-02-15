<?php
// /edit/index/?id=2
class Controller_Edit extends Controller {
	public function action_Index() {
		$id = $_GET['id'];
		$data = Model::getOne( $id, 'reviews' );
		$this->view->generate('edit_view.php', 'template_view.php', $data);
	}
	public function action_Update() {
		$id    = $_GET['id'];
		$table = 'reviews';
		$name  = $_POST['name' ];
		$email = $_POST['email'];
		$text  = $_POST['text' ];
		$date  = $_POST['date' ];
		$edit  = 1;

		$FormImg =  $_FILES['image']['name'];
		$DBImg = Model::getOne( $id, 'reviews');
		$DBImg = $DBImg[0]->img;
		if ( (!empty($FormImg) && empty($DBImg))  || (empty($FormImg) &&  empty($DBImg))) {
			$img = $DBImg;
		}

		if ( (!empty($FormImg) && !empty($DBImg)) || (empty($FormImg) && !empty($DBImg))) {
			$img = 'img/' . $FormImg;
		}

		Model::update($id, $table, $name, $email, $text, $date, $img);
		header('Location: /admin');
		exit;
	}
	public function action_Delete() {
		$id    = $_GET['id'];
		$table = 'reviews';
		Model::deleteOne($id, $table);
		header('Location: /admin');
		exit;
	}

}
?>