<?php

class AdministrationController extends ControllerBase
{

    public function indexAction()
    {
      if(!$this->session->get('auth')){
        return $this->dispatcher->forward(array('controller' => "signin", 'action'=> "login" ));
      }
    }

  public function registerAction()
  {

    $article = new Articles();

    $success = $article->save(
      $this->request->getPost(),
      [
        "title",
        "summary",
        "content",
        "publicationDate",
      ]
    );

    if($success){
      echo "Success";
      return $this->dispatcher->forward(array('controller' => "articles", 'action'=> "index" ));

    }else{
      echo "Sorry the following problems were generated : ";
      return $this->dispatcher->forward(array('controller' => "articles", 'action'=> "index" ));


      $messages = $article->getMessages();

      foreach ($messages as $message) {
        echo $message->getMessage(), "<br/>";
      }
    }
    $this->view->disable();
  }

}
 ?>
