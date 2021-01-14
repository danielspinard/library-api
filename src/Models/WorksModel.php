<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

class WorksModel extends DataLayer
{
    public function __construct()
    {
        parent::__construct(
            "works",
            [
                "title",
                "photo"
            ],
            "id",
            true
        );
    }

    public function save(): bool
    {
        if(
            !parent::save()
        )
            return false;

        return true;
    }
}
