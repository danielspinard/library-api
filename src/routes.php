<?php

$app = new CoffeeCode\Router\Router(env('APP_URL'));

$app->namespace("Src\Controllers")
    ->group("works");
    
$app->get("/{id}", "LibraryController:show", "api.show");
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