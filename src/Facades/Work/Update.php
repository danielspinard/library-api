<?php

namespace Src\Facades\Work;

use Src\Models\WorksModel as Repository;

class Update
{
    /**
     * @var Repository
     */
    private $repository;

    public function __construct(Repository $repository, array $work)
    {
        $repository->findById($this->id = $work['id']);

        $repository->title;
        $repository->photo;
        $repository->authors;
        $repository->publishing_company;

        $this->repository = $repository;
    }

    public function update(): Update
    {
        $this->repository->save();

        return $this;
    }

    public function getMessage(): string
    {
        if($fail = $this->repository->fail())
            return $fail->getMessage();

        return 'work successfully upate, id: ' . $this->id;
    }
}
