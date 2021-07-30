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

    public function getCategories(){
        return $this->hasMany(Categories::className(), ['id' => 'category'])->viaTable('mm_at_ct', ['article' => 'id']);
    }

}