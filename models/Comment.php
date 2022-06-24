<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $body
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $article_id
 * @property int|null $pinned
 *
 * @property Article $article
 * @property User $createdBy
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'required'],
            [['created_at', 'created_by', 'article_id', 'pinned'], 'default', 'value' => null],
            [['created_at', 'created_by', 'article_id', 'pinned'], 'integer'],
            [['body'], 'string', 'max' => 1000],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'body' => 'Body',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'article_id' => 'Article ID',
            'pinned' => 'Pinned',
        ];
    }

    /**
     * Gets query for [[Article]].
     *
     * @return \yii\db\ActiveQuery|ArticleQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * {@inheritdoc}
     * @return CommentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentQuery(get_called_class());
    }
}
