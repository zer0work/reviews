<?php

class Model {
	private $db = '';
	public function __construct () {
		$this->db = new DB;
	}
	protected static function dateNow() {
		return date("o-m-d");
	}

	public static function getAll($table) {
		$sql = "SELECT * FROM $table";
		$db  = new DB;
		return $db->query($sql);
	}

	public static function getOne($id, $table) {
		$sql = "SELECT `id`, `name`, `email`, `text`, `date`, `edit`, `img` 
						FROM `$table` WHERE id=?";
		$db  = new DB;
		return $db->query($sql, [$id]);
	}

	public static function deleteOne($id, $table) {
		$sql = "DELETE FROM `$table` WHERE id=?";
		$db  = new DB;
		return $db->execute($sql, [$id]);
	}

	public static function update($id, $table, $name, $email, $text, $date,  $img) {
		$sql = "UPDATE `$table` SET `name`=?,`email`=?,`text`=?,`date`=?,`edit`='1', `img`=? WHERE id=?";
		$db  = new DB;
		return $db->execute($sql, [$name, $email, $text, $date, $img, $id]);
	}

	public static function saveImage() {
			$uploaddir = __DIR__."/../../img/";

			$types = ['image/gif', 'image/png', 'image/jpeg'];
			$size = 10240000;

			if ( !in_array($_FILES['image']['type'], $types) ){
				return false;
			}
			if ($_FILES['image']['size'] > $size) {
				return false;
			}

			$uploadfile = $uploaddir . basename($_FILES['image']['name']);
			return "img/" . Model::resizeImage($_FILES['image']);
	}

	public static function resizeImage($file) {
		$max_size = 320;
		$uploaddir = __DIR__."/../../img/";

		if ($file['type'] == 'image/jpeg') {
			$src = imagecreatefromjpeg ($file['tmp_name']);
		}
		elseif ($file['type'] == 'image/png') {
			$src = imagecreatefrompng ($file['tmp_name']);
		}
		elseif ($file['type'] == 'image/gif') {
			$src = imagecreatefromgif ($file['tmp_name']);
		}
		else {
			return false;
		}

		$w_src = imagesx($src);
		$h_src = imagesy($src);

		if ($w_src > $max_size) { 
			$ratio = $w_src/$max_size; // вычисляем пропорций
			$w_dest = round($w_src/$ratio);
			$h_dest = round($h_src/$ratio);


			$dest = imagecreatetruecolor($w_dest, $h_dest);
			
			imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);
			imagejpeg($dest, $uploaddir . $file['name']);

			imagedestroy($dest);
			imagedestroy($src);
			return $file['name'];
		}
		else {
			imagejpeg($dest, $uploaddir . $file['name']);
			imagedestroy($src);
			return $file['name'];
		}
	}

}
?>