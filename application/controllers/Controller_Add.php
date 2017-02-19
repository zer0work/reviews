<?php 

class Controller_Add  extends Controller {
  public function action_Index() {
    $this->view->generate('', 'add_view.php');
  }
}