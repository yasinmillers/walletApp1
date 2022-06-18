<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LikedVideo]].
 *
 * @see LikedVideo
 */
class LikedVideoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LikedVideo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return LikedVideo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
