<?php

namespace Src\Facades\Work;

use Src\Models\WorksModel as Repository;

class Destroy
{
    /**
     * @var Repository
     */
    private $repository;

    /**
     * @var int
     */
    private $id;

    public function __construct(Repository $repository, int $id)
    {
        $this->repository = $repository->findById($this->id = $id);
    }

    public function destroy(): Destroy
    {
        if($this->repository->id)
            $this->repository->destroy();

        return $this;
    }

    public function getMessage(): string
    {
        if (!$this->repository->id)
            return 'work not found with id: ' . $this->id;
        
        return 'work id: ' . $this->id . ', successfully deleted!';
    }
}
