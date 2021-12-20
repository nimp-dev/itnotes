<?php
namespace console\models;
use Yii;


class Articles
{
    const STATUS_NON_SEND = 'is null limit 2';
    const ID = 'id';

    public static function getList()
    {
        $sql = 'SELECT * FROM articles WHERE status ' . self::STATUS_NON_SEND;
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return self::prepareList($result);
    }

    public function setId($articles){
        $sql = 'UPDATE articles SET status = 1 WHERE id IN ('.self::getId($articles).')';
        return Yii::$app->db->createCommand($sql)->execute();
    }


    public static function getId($result){
        $id = '';
        foreach ($result as $res){
            $id .= $res['id'].',';
        }
        return mb_substr($id, 0, -1);
    }

    protected static function prepareList($result)
    {
        if (!empty($result) && is_array($result)) {
            foreach ($result as &$value){
                    $value['content'] = self::getShort($value['content']);
            }
        }
        return $result;
    }

    protected static function getShort($sting){
        return mb_substr($sting,0,50);
    }

}