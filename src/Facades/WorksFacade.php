<?php

namespace Src\Facades;

use Src\Models\WorksModel as Repository;

class WorksFacade
{
    /**
     * @var Repository
     */
    private static $worksModel;


    /**
     * Creates an instance of the model Works
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
        $work = self::repository();

        $work->title = $data['title'];
        $work->photo = $data['photo'];
        $work->authors = $data['authors'];
        $work->publishing_company = $data['pub_company'];

        $work->save();

        if($work->fail())
            return $work->fail()->getMessage();
        
        return 'new work successfully registered, work id: ' . self::count();
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
        if (!self::validIntId($data['id']))
            return 'Impossible to delete work because the ID format is invalid!';

        $work = self::repository()->findById($data['id']);

        if (!$work->id)
            return 'work not found with id: ' . $data['id'];

        $work->destroy();
        return 'work #' . $data['id'] . 'successfully deleted';
    }
}
