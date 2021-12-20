<?php
namespace frontend\models;
use Yii;
use yii\base\Model;


class TestModel extends Model {
  public $name;
  public $passwd;


  public function rules(){
    return [
      [['name','passwd'],'required']
    ];
  }

  public function attributeLabels(){
    return [
        'name'=>'Имя',
        'passwd'=>'Паролдь'
    ];
  }

}