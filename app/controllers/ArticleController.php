<?php

class ArticleController extends ControllerBase
{

    public function indexAction($id)
    {
      $this->view->articles = Articles::findFirst($id);
    }
}
 ?>
