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
      $this->session->set('errorPost');
      return $this->response->redirect("articles")->send();


    }else{
      $this->session->set('errorPost', 'error');
      return $this->response->redirect("administration")->send();

      $messages = $article->getMessages();

      foreach ($messages as $message) {
        echo $message->getMessage(), "<br/>";
      }
    }
    $this->view->disable();
  }

  public function EditAction()
  {
    // code...
  }

}
 ?>
