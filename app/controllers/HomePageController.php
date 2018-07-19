<?php

class HomePageController extends ControllerBase
{

    public function indexAction()
    {
      $this->assets->addCss('css/style.css',false);
      $this->assets->addCss('css/bootstrap.css',false);
      $this->assets->addJs('js/jquery.js',false);
      $this->assets->addJs('js/script.js',false);
      $this->assets->addJs('js/bootstrap.js',false);


      $this->view->articles = Articles::find([
        "order"=> "publicationDate DESC",
      ]);

    }

}

 ?>
