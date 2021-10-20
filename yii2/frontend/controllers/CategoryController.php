<?php


namespace frontend\controllers;
use frontend\models\Categories;
use frontend\models\Articles;
use frontend\models\MmAtCt;
use Yii;

class CategoryController extends AppController{
    public $data;
    public $tree;
    public $ontree;

    public function actionIndex(){
        $category = Categories::find()->all();
        $this->data = Categories::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $res = $this->tree;
        return $this->render('index', compact('category','res'));
    }

    public function actionView($id){
        $this->data = Categories::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->ontree = $this->getOnTree($id);
        $article = Articles::find()->joinWith('categories')->where(['categories.id' => $id])->all();
        $res = $this->ontree;

        if(empty($res))
            $res = Categories::findOne($id);
        return $this->render('view', compact('res','article'));
    }


    protected function getTree()
    {
        $tree = [];
        foreach ($this->data as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            }
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }

        return $tree;
    }

    protected function getOnTree($id){
        $ontree = [];
        foreach($this->tree as $key => $truetree){
            if($key == $id){
                // $ontree[$key] = $truetree;
                foreach ($truetree as $k => $tr){
                    $ontree[$k] = $tr;
                }
            } else  {   if(isset($truetree['childs'] ))
                foreach ($truetree['childs'] as $ki => $true){
                    if($ki == $id)
                        foreach ($true as $k => $tr)
                            $ontree[$k] = $tr;
                }
            }
        }
        return $ontree;
    }


}