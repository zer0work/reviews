<?php 
	class Model_Auth {

		public $userLP = '';
		public $dataBaseLP = '';

		public function getHashDB() {
			$h = Model::getAll('accounts');
			return $dataBaseLP = $h[0]->hash;
		}

		public function __construct($loginPassword) {
			$this->userLP     = $loginPassword;
			$this->dataBaseLP = $this->getHashDB();
		}

		public function check() {
			if (strcmp($this->userLP, $this->dataBaseLP) === 0) {
				return true;
			}
			else {
				return false;
			}
		}
	}
 ?>