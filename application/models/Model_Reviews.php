<?php

class Model_Reviews extends Model {
	public function addReview($name, $text, $email, $date, $edit = false, $image) {
		if ( empty($name) || empty($text) || empty($email) ) {
			return false;
		}
		$date = Model::dateNow();

		$sql = "INSERT INTO `reviews` (`name`, `email`, `text`, `date`, `edit`, `img`) 
						VALUES ( '$name', '$email', '$text', '$date', '$edit', '$image' )";
		$db = new DB;
		$db->execute($sql);
	}
	
	public static function moderReview($id, $value) {
		$sql = "UPDATE `reviews` SET `check`=? WHERE id=?";
		$db  = new DB;
		
		return $db->execute($sql, [$value]);
	}

	public static function sortDate($f1,$f2) {
		// if($f1->date > $f2->date) return -1;
		// elseif($f1->date < $f2->date) return 1;
		// else return 0;
	}
	public static function sortText($f1,$f2) {
		$property = $_GET['sort'];
		if($f1->$property < $f2->$property) return -1;
		elseif($f1->$property > $f2->$property) return 1;
		else return 0;
	}
}
?>