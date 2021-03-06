<?php

namespace Src\Facades;

use Src\Models\WorksModel as Repository;
use Src\Facades\Work\{
    Store, Destroy, Update
};

class WorksFacade
{
    /**
     * @var Repository
     */
    private static $worksModel;

    /**
     * Return an instance of the ModelWorks
     *
     * @return Repository
     */
    private static function repository(): Repository
    {
        if(empty(self::$worksModel))
            self::$worksModel = new Repository();
        
        return self::$worksModel;
    }

    private static function validIntId(string $id): bool
    {
        return filter_var($id, FILTER_VALIDATE_INT);
    }

    public static function count(): int
    {
        return self::repository()->find(null, null, 'id')->count();
    }

    public static function store(array $data): string
    {
        return (new Store(self::repository(), $data))->store()->getMessage();
    }

    public static function update(array $data): string
    {
        if (self::validIntId($data['id']))
            return (new Update(self::repository(), $data))->update()->getMessage();
        
        return 'Error to update work because the ID is invalid!';
    }

    public static function destroy(array $data): string
    {
        if (self::validIntId($id = $data['id']))
            return (new Destroy(self::repository(), $id))->destroy()->getMessage();
        
        return 'Impossible to delete work because the ID format is invalid!';
    }

    public static function findById(array $data)
    {
        $work = self::repository()->findById($data['id']);

        if ($work->id)
            return $work->data();
            
        return 'No work found with id: ' . $data['id'];
            
    }

    public static function fetchAll()
    {
        return self::repository()->find()->order('id')->fetch(true);
    }
}
