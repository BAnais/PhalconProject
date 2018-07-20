<?php

class ArticlesController extends ControllerBase
{

    public function indexAction()
    {
      if(!$this->session->get('auth')){
        return  $this->response->redirect("signin")->send();
      }
      $this->view->userName = $this->session->get('userName');
      $this->view->articles = Articles::find([
        "order"=> "publicationDate DESC",
      ]);
    }

    /**
     * Creates an Article
     */
    public function createAction(){
      if(!$this->session->get('auth')) {
        return $this->response->redirect("signin")->send();
      }
      else if($this->request->getPost('id')){
        $article = Articles::findFirstByid($this->request->getPost('id'));

        $article->save(
          $this->request->getPost(),
          [
            "title",
            "summary",
            "content",
            "publicationDate",
          ]
        );
        if($success){
          $this->session->remove('errorPost');
        }else{
          $this->session->set('errorPost', 'error');
        }
        return $this->response->redirect("articles")->send();
      }
      else if($this->request->getPost()){
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
          $this->session->remove('errorPost');
        }else{
          $this->session->set('errorPost', 'error');
        }

        return $this->response->redirect("articles")->send();
      }

    }

    /**
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $article = Articles::findFirstByid($id);
            if (!$article) {
                $this->flash->error("Article was not found");

                $this->dispatcher->forward([
                    'controller' => "Articles",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->pick('articles/create');
            $this->view->id = $article->id;
            $this->tag->setDefault("id", $article->id);
            $this->tag->setDefault("title", $article->title);
            $this->tag->setDefault("summary", $article->summary);
            $this->tag->setDefault("content", $article->content);
            $this->tag->setDefault("publicationDate", $article->publicationDate);
        }
    }

    /**
     * Deletes a Article
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $article = Articles::findFirstByid($id);
        if (!$article) {
            $this->flash->error("Article was not found");

            return $this->response->redirect("articles")->send();


            return;
        }

        if (!$article->delete()) {

            foreach ($article->getMessages() as $message) {
                $this->flash->error($message);
            }


            return;
        }

        $this->flash->success("Article was deleted successfully");

        return $this->response->redirect("articles")->send();

    }
}
 ?>
