<?php

namespace Src\Facades;

use Src\Models\WorksModel as Repository;

class WoksFacade
{
    /**
     * @var Repository
     */
    private static $works;

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
        if(empty(self::$works))
            self::$works = new Repository();
        
        return self::$works;
    }

    public static function count(int $count = 0)
    {
        if($count > 1)
            self::$count = $count;
        
        return self::$count;
    }

    public static function findById($id)
    {
        $work = self::repository()->findById($id);

        if ($work->id)
            return $work->data();

        return 'no work found with id: ' . $id;
    }

    public static function fetchAll()
    {
        $works = self::repository()->find();
        self::count($works->count());
        
        return $works->order('id')->fetch(true);
    }
}
