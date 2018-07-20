<?php

class CreateUserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function createUserAction()
    {

      $user = new Users();

      $user->userName = $this->request->getPost("userName");
      $user->userPassword = $this->request->getPost("userPassword");

      // Store the password hashed
      $user->userPassword = $this->security->hash($user->userPassword);
      if(!Users::findFirstByuserName($user->userName)){
        if ($user->save()) {
          $this->flash->success("user was created successfully");
          return $this->dispatcher->forward(array(
            "controller" => "signin",
            "action" => "index"
          ));
        }else {
          foreach ($user->getMessages() as $message) {
            $this->flash->error($message);
          }
          return $this->dispatcher->forward(array(
            "controller" => "createUser",
            "action" => "index"
          ));
        }
      }else {
        $this->flash->error("user already exist");
        return $this->dispatcher->forward(array(
          "controller" => "createUser",
          "action" => "index"
        ));
      }


      }
}
