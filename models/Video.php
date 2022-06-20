<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property string      $video_id
 * @property string      $video_name
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $uploaded_at
 * @property string|null $updated_at
 * @property int|null $views
 * @property string $video
 * @property int $user_id
 * @property string $video_url
 *
 * @property LikedVideo[] $likedVideos
 * @property SavedVideo[] $savedVideos
 * @property User $user
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @var string
     */
    public $video_id;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    public $upload;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['uploaded_at', 'updated_at'], 'safe'],
            [['views', 'user_id'], 'default', 'value' => null],
            [['views', 'user_id'], 'integer'],
            [['title', 'video', 'video_url'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 500],
            [['upload'], 'file', 'extensions' =>'mp4, mpeg-4, acc, mpeg', 'maxSize' => 9000000 ],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'uploaded_at' => 'Uploaded At',
            'updated_at' => 'Updated At',
            'views' => 'Views',
            'video' => 'Video',
            'user_id' => 'User ID',
            'video_url' => 'Video Url',
        ];
    }

    /**
     * Gets query for [[LikedVideos]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getLikedVideos()
    {
        return $this->hasMany(LikedVideo::className(), ['video_id' => 'id']);
    }

    /**
     * Gets query for [[SavedVideos]].
     *
     * @return \yii\db\ActiveQuery|SavedVideoQuery
     */
    public function getSavedVideos()
    {
        return $this->hasMany(SavedVideo::className(), ['video_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return VideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VideoQuery(get_called_class());
    }
    public function save($runValidation = true, $attributeNames = null){
        $isInsert = $this->isNewRecord;
        if ($isInsert) {
            $this->video_id = Yii::$app->security->generateRandomString(8);
            $this->title = $this->video->name;
            $this->video_name = $this->video->name;
        }
        $saved = parent::save($runValidation, $attributeNames);
        if (!$saved) {
            return false;
        }
        if ($isInsert) {
            $videoPath = Yii::getAlias('@frontend/web/storage/videos/' . $this->video_id . '.mp4');
            if (!is_dir(dirname($videoPath))) {
                FileHelper::createDirectory(dirname($videoPath));
            }
            $this->video->saveAs($videoPath);
        }

    }
}

