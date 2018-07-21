<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    /*
    * redirect
    */
    public function redirectAction()
    {
      return $this->response->redirect("homepage")->send();
    }

}
