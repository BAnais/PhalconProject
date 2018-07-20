<?php
use Phalcon\Filter;

class SigninController extends ControllerBase
{

  /*
  *indexAction redirect to /articles if user is loggedin
  * else displays the signin page
  */
  public function indexAction()
  {
    if($this->session->get('auth')){
      return $this->response->redirect("articles")->send();
    }
  }

  /*
  * loginAction compares the signin form to the Model Users of the debug
  * if the user exists compare the password entered with the hashed one into the DB
  * if everithing is correct -> creates a session
  *
  */
  public function loginAction() {

    if ($this->request->getPost()) {

      $userP = new Users();
      $user = new Users();
      $userP->userName = $this->request->getPost("userName");
      $userP->userPassword = $this->request->getPost("userPassword");
      $user = Users::findFirstByuserName($userP->userName);

      if ($user) {

        if ($this->security->checkHash($userP->userPassword, $user->userPassword)){

          $this->session->set('auth', "yes");
          $this->session->set('userName', $user->userName);
          $this->session->remove('errorLog');
          return $this->response->redirect("articles")->send();

        } else {

          echo "failed";
          $this->session->set('errorLog', 'errorPwd');
          return $this->response->redirect("signin")->send();
        }
      } else {

        echo "not found";
        $this->session->set('errorLog', 'errorUserN');
        return $this->response->redirect("signin")->send();
      }
    }
  }

  /*
  *LogoutAction remove the authentification of the curent user
  * and redirect to the homepage
  */

  public function logoutAction() {
     $this->session->remove('auth');
     return $this->response->redirect("homepage")->send();
  }


  /*
  * createuserAction create new Users if it doesn't exist
  * sanitize data and hashes + salts (by default) the password  before sending it to the DB
  */

  public function createuserAction()
  {
    $filter = new Filter();
    $user = new Users();

    $user->userName = $filter->sanitize($this->request->getPost("userName"),['striptags','trim', ]);
    $user->userPassword = $filter->sanitize($this->request->getPost("userPassword"),['striptags','trim', ]);

    // Store the password hashed
    $user->userPassword = $this->security->hash($user->userPassword);
    if(!Users::findFirstByuserName($user->userName)){
      if ($user->save()) {
        $this->flash->success("user was created successfully");
        return $this->response->redirect("signin")->send();

      }else {
        foreach ($user->getMessages() as $message) {
          $this->flash->error($message);
        }

      }
    }else {
      $this->flash->error("user already exist");

    }
  }
}
 ?>
