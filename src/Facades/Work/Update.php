<?php

namespace Src\Facades\Work;

use Src\Models\WorksModel as Repository;

class Update
{
    /**
     * @var Repository
     */
    private $repository;

    /**
     * @var int
     */
    private $id;
    
    public function __construct(Repository $repository, array $work)
    {
        $repository = $repository->findById($this->id = $work['id']);

        $repository->title = $work['title'] ?? $repository->title;
        $repository->photo = $work['photo'] ?? $repository->photo;
        $repository->authors = $work['authors'] ?? $repository->authors;
        $repository->publishing_company = $work['pub_company'] ?? $repository->publishing_company;

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
