<?php 
	class DB {
		public $title;
		public $text;
		public $date;

		public static function connect() {
			$mysqli = new mysqli("localhost", "root", "", "reviewsDB");
			if (mysqli_connect_errno()) {
				printf("Не удалось подключиться: %s\n", mysqli_connect_error());
				exit();
			}
			else {
				return $mysqli;
			}
		}

		public static function execute($sql) 
		{
			$mysqli = self::connect();
			return mysqli_query($mysqli, $sql);
		}

		public static function query($sql, $class = 'stdClass') 
		{
			$mysqli = self::connect();
			$res = mysqli_query($mysqli, $sql);
			if ($res === false) 
			{
				return false;
			}
			$ret= [];
			while ($row = $res->fetch_object($class))
			{
				$ret[] = $row;
			};
			return $ret;
		}

	}
?>