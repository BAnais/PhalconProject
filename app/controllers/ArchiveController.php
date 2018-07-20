<?php

class ArchiveController extends ControllerBase
{

    public function indexAction()
    {
      if($this->session->get('auth')){
        return $this->response->redirect("articles")->send();
      }
      $this->view->articles = Articles::find([
        "order"=> "publicationDate DESC",
      ]);
    }
}
 ?>
