<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use backend\models\Articles;

class MailerController extends Controller
{
    public function actionSend(){

        $articles = Articles::find()
            ->orderBy(['id'=> SORT_DESC])
            ->limit(5)
            ->all();

        $title_art = '';
        foreach ($articles as $artic){
            $title_art .= $artic->title . '<br>';
        }


		 Yii::$app->mailer->compose()
                ->setFrom('egorkonopka@ukr.net')
                ->setTo('egorkonopka93@gmail.com')
                ->setSubject('Тема сообщения')
                ->setTextBody('Текст сообщения')
                ->setHtmlBody($title_art)
                ->send();

        
        die;
    }

}