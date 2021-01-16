<?php

namespace Src\Facades;

use Src\Models\WorksModel as Repository;
use Src\Facades\Work\{Store, Destroy};

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

    public static function store(array $data)
    {
        return (new Store(self::repository(), $data))->store()->getMessage();
    }

    public static function findById(array $data)
    {
        if (!self::validIntId($data['id']))
            return 'id format is invalid!';;

        $work = self::repository()->findById($data['id']);

        if (!$work->id)
            return 'no work found with id: ' . $data['id'];
            
        return $work->data();
    }

    public static function fetchAll()
    {
        return self::repository()->find()->order('id')->fetch(true);
    }

    public static function destroy(array $data): string
    {
        if (self::validIntId($id = $data['id']))
            return (new Destroy(self::repository(), $id))->destroy()->getMessage();
        
        return 'Impossible to delete work because the ID format is invalid!';
    }
}
