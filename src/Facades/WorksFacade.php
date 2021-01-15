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
     * @var int
     */
    private static $count = 0;

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

    public static function count()
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
        if (!filter_var($data['id'], FILTER_VALIDATE_INT))
            return 'invalid id';

        $work = self::repository()->findById($data['id']);

        if ($work->id)
            return $work->data();

        return 'no work found with id: ' . $data['id'];
    }

    public static function fetchAll()
    {
        return self::repository()->find()->order('id')->fetch(true);
    }

    public static function destroy(int $id)
    {
        $work = self::repository()->findById($id);

        if (!$work->id)
            return 'work not found with id: ' . $id;

        $work->destroy();
        return 'work successfully deleted';
    }
}
