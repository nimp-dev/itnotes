<?php


namespace frontend\controllers;
use frontend\models\Categories;
use frontend\models\Articles;
use frontend\models\MmAtCt;
use Yii;

class PostController extends AppController{
    public function actionIndex(){
        $article = Categories::find()->with('articles')->all();
        return $this->render('index',compact('article'));
    }

    public function actionSinglePost($id){
        $post = Articles::findOne($id);
        return $this->render('single-post', compact('post'));
    }

}