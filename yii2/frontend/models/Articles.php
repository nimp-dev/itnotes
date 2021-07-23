<?php


namespace frontend\models;
use yii\db\ActiveRecord;

class Articles  extends ActiveRecord{
    public static function primaryKey()
    {
        return ['id'];
    }

    public static function tableName(){
        return 'articles';
    }

}