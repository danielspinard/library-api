<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

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
            !$this->validateTitle()
            or !parent::save()
        )
            return false;

        return true;
    }

    protected function validateTitle(): bool
    {
        if(
            strlen($this->title) > 5
            and strlen($this->title) < 50
        )
            return true;

        $this->fail = new Exception("The title of the work must contain between 5 and 50 characters!");
        return false;
    }
}
