<?php
namespace frontend\models;
use yii\db\ActiveRecord;


class MmAtCt extends ActiveRecord{


    public static function primaryKey()
    {
        return ['id'];
    }


    public function getArticles(){
        return $this->hasMany(Articles::className(),['id'=>'article']);
    }
    public function getCategories(){
        return $this->hasMany(Categories::className(),['id'=>'category']);
    }

}