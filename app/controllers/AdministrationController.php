<?php

class AdministrationController extends ControllerBase
{

    public function indexAction()
    {
      if(!$this->session->get('auth')){
        return $this->response->redirect("signin")->send();
      }
      $this->view->userName = $this->session->get('userName');
      $this->view->articles = Articles::find([
        "order"=> "publicationDate DESC",
      ]);
    }

  public function EditAction()
  {
    // code...
  }

}
 ?>
