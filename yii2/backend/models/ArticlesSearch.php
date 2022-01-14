<?php
namespace backend\models;
use Yii;
use yii\base\BaseObject;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ArticlesSearch extends Articles{
    public $limit;

    public function rules()
    {
        return [
            [['id'],'integer'],
            [['created_at', 'updated_at','content'], 'safe'],
            [['title','lemma','img','type'], 'safe'],
            [['file'], 'image'],
            [['categories_array'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Articles::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 15
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ],
        ]);

        if($this->limit){
            $dataProvider->pagination->pageSize = $this->limit;
        }

        $this->load($params);

        if(!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['in','title',$this->title]);
        $query->andFilterWhere(['in','type',$this->type]);
        $query->andFilterWhere(['in','lemma',$this->lemma]);


        return $dataProvider;

    }


}