<?php

class ArticleController extends ControllerBase
{

    public function indexAction($id)
    {
      if($this->session->get('auth')){
        return $this->response->redirect("articles")->send();
      }
      $this->view->articles = Articles::findFirst($id);
    }
}
 ?>
