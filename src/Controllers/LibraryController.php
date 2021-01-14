<?php

namespace Src\Controllers;

class LibraryController
{
    public function store(array $data): void
    {
        echo "store";
    }

    public function index(): void
    {
        echo "index";
    }

    public function update(array $data): void
    {
        echo "update";
    }

    public function destroy(array $data): void
    {
        echo "destroy";
    }
}
