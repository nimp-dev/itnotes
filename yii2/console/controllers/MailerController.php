<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
//use backend\models\Articles;
use console\models\Articles;


class MailerController extends Controller
{
    public function actionSend(){

        $articles = Articles::getList();
        $useremail = ['egorkonopka93@gmail.com','nimp93it@gmail.com'];

        $emails = 'finance.sms@volumes.uk.com, zmr@volumes.uk.com';
        $clientMails = '';
        if(strpos($emails,',')){
            $clientMails = explode(',',trim($emails));
        }elseif(strpos($emails,';')){
            $clientMails = explode(';',trim($emails));
        }else{
            $userMail[] = trim($emails);
        }

        if($clientMails){
            foreach ($clientMails as $val){
                if($val){
                    $userMail[] = $val;
                }
            }
        }
        // $userMail = $this->prepareEmailList($emails);
        var_dump($userMail);
        return;

        try {
            Yii::$app->mailer->compose('/mailer/newslist', [
                'articles' => $articles
        ])
            ->setFrom('egorkonopka@ukr.net')
            ->setTo($useremail)
            ->setSubject('Тема сообщения')
            ->send();

        Articles::setId($articles);
            Yii::info('новости id: '.Articles::getId($articles).' были отправлены','MyLogs');

        } catch (\Swift_SwiftException $e){
        	Yii::info( $e->getMessage().'новости id: '.Articles::getId($articles).'  не были отправлены','MyLogs');
           // Yii::error($e->getMessage(), 'MyLogs');
        }

    }
    // private function prepareEmailList(string $emails): array
    // {
    //     $emailList = preg_split('/[,;]/', $emails, -1, PREG_SPLIT_NO_EMPTY);
    //    // $emailList = array_merge($emailList, Yii::$app->params['invoicesMail']);

    //     return array_map(function ($email) {
    //         return trim($email);
    //     }, $emailList);
    // }


}