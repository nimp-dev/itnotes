<?php
namespace backend\models;
use yii\db\ActiveRecord;


class MmAtCt extends ActiveRecord{




    public static function tableName(){
        return 'mm_at_ct';
    }

    public function rules()
    {
        return [
            [['id','article','category'], 'integer'],
        ];
    }


    public function getArticles(){
        return $this->hasMany(Articles::className(),['id'=>'article']);
    }

    public function getCategories(){
        return $this->hasOne(Categories::className(),['id'=>'category']);
    }



}