<?php

namespace Src\Controllers;

use Src\Facades\WorksFacade as Facade;

class LibraryController
{
    public function store(array $data): void
    {
        echo response(['message' => Facade::store($data)]);
    }

    public function show(array $data)
    {
        echo response(['work' => Facade::findById($data)]);
    }

    public function update(array $data): void
    {
        echo response(['message' =>  Facade::update($data)]);
    }

    public function destroy(array $data): void
    {
        echo response(['message' =>  Facade::destroy($data)]);
    }

    public function index()
    {
        foreach(Facade::fetchAll() as $work)
            $works[$work->id] = $work->data();

        echo response([
            'count' => Facade::count(),
            'works' => $works ?? null
        ]);
    }
}
