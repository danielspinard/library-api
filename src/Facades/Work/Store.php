<?php

namespace Src\Facades\Work;

use Src\Models\WorksModel as Repository;

class Store
{
    /**
     * @var Repository
     */
    private $repository;

    public function __construct(Repository $repository, array $work)
    {
        $repository->title = $work['title'];
        $repository->photo = $work['photo'];
        $repository->authors = $work['authors'];
        $repository->publishing_company = $work['pub_company'];

        $this->repository = $repository;
    }

    public function store(): Store
    {
        $this->repository->save();

        return $this;
    }

    public function getMessage(): string
    {
        if($fail = $this->repository->fail())
            return $fail->getMessage();

        return 'new work successfully registered, work id';
    }
}
