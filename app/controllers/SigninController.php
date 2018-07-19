<?php

class SigninController extends ControllerBase
{

  public function indexAction()
  {

  }
//hasing and salting https://crackstation.net/hashing-security.htm

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

          return $this->response->redirect("articles")->send();

        } else {
          echo "failed";

          return $this->response->redirect("signin/failed")->send();


        }
      } else {
        echo "not found";
        //return $this->dispatcher->forward(array("controller" => "signin", "action" => "notfound"));
        //  $this->security->hash(rand());
      }
    }
  }

  // TODO: notfound & failed action


  public function logoutAction() {
     $this->session->remove('auth');
     return $this->response->redirect("homepage")->send();
  }
}
 ?>
