<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "Comment".
 *
 * @property integer $id
 * @property string $username
 * @property string $content
 * @property integer $user_id
 * @property integer $towho
 * @property integer $parent_id
 * @property integer $up
 * @property integer $down
 * @property integer $article_id
 * @property integer $createdTime
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'content', 'user_id', 'createdTime'], 'required','message'=>'{attribute}不能为空'],
            [['content'], 'string'],
            [['user_id', 'towho', 'parent_id', 'up', 'down', 'article_id', 'createdTime'], 'integer'],
            [['username','tousername'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'content' => '评论内容',
            'user_id' => 'User ID',
            'towho' => 'Towho',
            'parent_id' => 'Parent ID',
            'up' => 'Up',
            'down' => 'Down',
            'article_id' => 'Article ID',
            'createdTime' => 'Created Time',
            'tousername' => 'To Username',
        ];
    }
    public function search($id){
        $query = self::find()->where(['article_id'=>$id])->orderBy('id');
        $dataprovider = new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>[
                'pageSize'=>8,
            ],
        ]);
        return $dataprovider;
    }
    public static function count($id){
        $count = self::find()->where(['article_id'=>$id])->count();
        return $count;
    }
    public function search_son($id){
        $query = self::find()->where(['parent_id'=>$id])->orderBy('id');
        $dataprovider = new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>[
                'pageSize'=>12
            ],
        ]);
        return $dataprovider;
    }
    public function getImg(){
            $model = User::find()->where(['id'=>$this->user_id])->one();
            return $model->photo;
    }
}

