<?php
namespace backend\controllers;
use backend\models\Post;
use Yii;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;


class StatController extends AppAdminController {


    public function actionIndividual(){
        
        $token = 'X8DcTOPfj-7KKjI';
        $url = 'http://im.egor.dev.smsclub.mobi/v2/sms/send';

        $data = json_encode([
            'src_addr' => 'Test_resend',
            'data_message' => [
                [
                    'phone' => '0961921770',
                    'message' => 'hello1'
                ],
                [
                    'phone' => '0961921771',
                    'message' => 'hello2'
                ],
            ]
        ]);

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $token,
                'Content-Type: application/json'
            ]
        ]);

        $result = curl_exec($ch);


        $data = json_decode($result,true);

        curl_close($ch);
          
        echo '<pre>'.print_r($data, true).'</pre>';
           

    }


public  function actionApi(){


    $token = 'X8DcTOPfj-7KKjI';
    $url = 'http://im.egor.dev.smsclub.mobi/sms/send';

    $data = json_encode([
        'phone' => ['0961921776','0961921773','0961921775'],
        'message' => 'test_message_API',
        'src_addr' => 'Test_resend'
    ]);

    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        ]
    ]);

    $result = curl_exec($ch);


    $data = json_decode($result,true);

        curl_close($ch);
        echo '<pre>';
        print_r($data);
        echo '</pre>';
}

public function actionStatus(){

    $token = 'X8DcTOPfj-7KKjI';
    $url = 'http://im.egor.dev.smsclub.mobi/sms/status';

    $data = json_encode([
        'id_sms' => ['945831143'],
    ]);

    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        ]
    ]);

    $result = curl_exec($ch);
    echo $result;

    curl_close($ch);
}

   public function actionIndex() {
        $query = Post::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        return $this->render('index',['dataProvider'=>$dataProvider]);
    }

    public  function actionApi2(){
        $api_key = '7572982b63a10d537a5fcc4ba257f939';
        $url = 'https://api.openweathermap.org/data/2.5/weather';

        $options = [
            'id' => 703448,
            'appid' => '7572982b63a10d537a5fcc4ba257f939',
            'units' => 'metric',
            'lang' => 'en',
        ];

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_URL, $url.'?'.http_build_query($options));

        $response = curl_exec($ch);
        $data = json_decode($response,true);

        curl_close($ch);
        echo '<pre>';
        print_r($data);
        echo '</pre>';


        foreach ($data['main'] as $key => $value){
            echo $key.'->'.$value.'<br>';
        }
    }



}