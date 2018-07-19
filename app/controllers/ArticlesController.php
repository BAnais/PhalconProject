<?php

class ArticlesController extends ControllerBase
{

    public function indexAction()
    {
      $this->view->userName = $this->session->get('userName');
    }
}
 ?>
