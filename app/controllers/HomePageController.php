<?php

class HomePageController extends ControllerBase
{

    public function indexAction()
    {
      $this->view->articles = Articles::find([
        "order"=> "publicationDate DESC",
      ]);

    }

}








 ?>
