<?php

use CoffeeCode\Router\Router;

$app = new Router("http://library.test");

$app->namespace("Src\Controllers")
    ->group("works");
    
$app->post("/", "LibraryController:store", "api.store");
$app->get("/", "LibraryController:index", "api.index");
$app->put("/{id}", "LibraryController:update", "api.update");
$app->delete("/{id}", "LibraryController:destroy", "api.destroy");

$app->dispatch();

if ($app->error())
    echo response([
        "code" => $app->error(), 
        "message" => "request or response error"
    ]);