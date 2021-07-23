<?php


namespace frontend\controllers;
use frontend\models\Articles;
use frontend\models\Categories;

class PostController extends AppController{
    public function actionIndex(){
        $article = Articles::find()->all();
        $cat = Categories::find()->all();
        return $this->render('index',compact('article','cat'));
    }

}