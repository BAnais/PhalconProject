<?php

class SigninController extends ControllerBase
{

  public function indexAction()
  {
    if($this->session->get('auth')){
      return $this->response->redirect("articles")->send();
    }
  }

  public function loginAction() {

    if ($this->request->isPost()) {
      $userP = new Users();
      $user = new Users();
      $userP->userName = $this->request->getPost("userName");
      $userP->userPassword = $this->request->getPost("userPassword");
//         $userP->userName="admin";
//         $userP->userPassword= "admin";
      $user = Users::findFirstByuserName($userP->userName);

      if ($user) {
      /*  $passFormHash = $this->security->hash($userP->userPassword);
        echo $passFormHash."<br/>";
        echo $user->userPassword."<br/>";*/
        if ($this->security->checkHash($userP->userPassword, $user->userPassword)){
        // if($userP->userPassword == $user->userPassword){
        //  echo "log in";
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



  public function logoutAction() {
     $this->session->remove('auth');
     return $this->response->redirect("homepage")->send();
  }

  public function createuserAction()
  {
    $user = new Users();

    $user->userName = $this->request->getPost("userName");
    $user->userPassword = $this->request->getPost("userPassword");

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
