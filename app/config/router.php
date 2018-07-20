<?php

$router = $di->getRouter();

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
  "/article/{id}",
  [
    "controller"=>"articles",
    "action"=>"article",
    "params"=>1
  ]
);

$router->add(
  "articles/edit/{id}",
  [
    "controller"=>"articles",
    "action"=>"edit",
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
$router->handle();
