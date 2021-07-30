<?php
namespace frontend\models;
use yii\db\ActiveRecord;


class Categories extends ActiveRecord{


    public static function primaryKey()
    {
        return ['id'];
    }

    public static function tableName(){
        return 'categories';
    }

    public function getArticles(){
        return $this->hasMany(Articles::className(), ['id' => 'article'])->viaTable('mm_at_ct', ['category' => 'id']);
    }

}