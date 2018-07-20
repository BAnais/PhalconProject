<?php

$router = $di->getRouter();

// Define your routes here
$router->add(
  "/checkToken/{goal}",
  ["controller"=>"signin",
  "action"=>"check",
  "params"=> 1 ]
);

$router->add("/logout",
  ["controller"=>"signin",
  "action"=>"logout"]
);

$router->add(
  "/article/{id}",
  ["controller"=>"article",
  "action"=>"index",
  "params"=>1]
);

$router->add(
  "articles/edit/{id}",
  [
    "controller"=>"articles",
    "action"=>"edit",
    "params"=>1
  ]
);
$router->handle();
