<?php
use Phalcon\Filter;
class ArticlesController extends ControllerBase
{
    /*
    * indexAction check if the user is auth as admin
    * and send to the view a list of all the articles store in the DB
    */
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
     * createAction checks if user is logged in
     *  Edits Article
     * Creates an Article if doesn't exist
     *  sanitize all sent informations
     *  check if all form fields are not empty
     */
    public function createAction(){
      $filter = new Filter();
      if(!$this->session->get('auth')) {
        return $this->response->redirect("signin")->send();
      }
      else if($this->request->getPost('id')){
        $article = Articles::findFirstByid($this->request->getPost('id'));

        $article->save(
           $filter->sanitize($this->request->getPost(),['striptags','trim', ]),
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
          $filter->sanitize($this->request->getPost(),['striptags','trim', ]),
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
     * editAction sends to the edit view informations about an article according to an @param id
     *
     * @param string $id
     */
    public function editAction($id)
    {
      if(!$this->session->get('auth')) {
        return $this->response->redirect("signin")->send();
      }
        if (!$this->request->getPost()) {

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
     * Deletes article identified by an @param id
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

    /*
    * articleAction gets data from the Model according to an id
    * and sends it to the view as @Articles $articles
    *
    * @param string $id : article id
    */
    public function articleAction($id)
    {
        $this->view->articles = Articles::findFirst($id);
    }

    /*
    * listAction picks a view according to the @param $page received
    * gets data from the Model depending on the publication DESC
    * and sends it to the view as @Articles $article
    */
    public function listAction($page)
    {
      $this->view->pick("articles/" . $page);
      $this->view->articles = Articles::find([
        "order"=> "publicationDate DESC",
      ]);
    }
}
 ?>
