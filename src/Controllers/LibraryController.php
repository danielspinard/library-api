<?php

namespace Src\Controllers;

use Src\Facades\WorksFacade as Facade;

class LibraryController
{
    public function store(array $data): void
    {
        echo "store";
    }

    public function show(array $data)
    {
        echo response([
            'work' => Facade::findById($data['id'])
        ]); 
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

    public function update(array $data): void
    {
        echo "update";
    }

    public function destroy(array $data): void
    {
        Facade::destroy($data['id']);
    }
}
