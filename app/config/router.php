<?php

$router = $di->getRouter(false);

// Define your routes here
$router->add(
  "/logout",
  [
    "controller"=>"signin",
    "action"=>"logout"
  ]
);
$router->add(
  "/createuser",
  [
    "controller"=>"signin",
    "action"=>"createuser"
  ]
);

$router->add(
  "/articles/edit/{id}",
  [
    "controller"=>"articles",
    "action"=>"edit",
    "params"=>1
  ]
);

$router->add(
  "/articles/create",
  [
    "controller"=>"articles",
    "action"=>"create",
    "params"=>1
  ]
);

$router->add(
  "/article/{id}",
  [
    "controller"=>"articles",
    "action"=>"article",
    "params"=>1
  ]
);

$router->add(
  "/articles",
  [
    "controller"=>"articles",
    "action"=>"index",
    "params"=>1
  ]
);

$router->add(
  "/archive",
  [
    "controller"=>"articles",
    "action"=>"archive"
  ]
);

$router->add(
  "/homepage",
  [
    "controller"=>"articles",
    "action"=>"homepage"
  ]
);

$router->add(
  "/signin/login",
  [
    "controller"=>"signin",
    "action"=>"login"
  ]
);

$router->add(
  "/signin",
  [
    "controller"=>"signin",
    "action"=>"index"
  ]
);
$router->add(
  "/homepage",
  [
    "controller"=>"articles",
    "action"=>"list",
    "params"=>"homepage"
  ]
);
$router->add(
  "/archive",
  [
    "controller"=>"articles",
    "action"=>"list",
    "params"=>"archive"
  ]
);

$router->notFound(array(
    "controller" => "index",
    "action" => "redirect"
));


$router->handle();
