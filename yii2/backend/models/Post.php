<?php
namespace backend\models;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use Yii;

class Post extends ActiveRecord {

    public static function tableName()
    {
        return 'articles';
    }

    public static function primaryKey()
    {
        return ['id'];
    }

    public function rules()
    {
        return [
            [['created_at', 'updated_at','content'], 'safe'],
            [['title','lemma','img','type'], 'string'],
            [['file'], 'image'],
            [['categories_array'], 'safe'],
        ];
    }


}