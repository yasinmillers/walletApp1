<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SavedVideo]].
 *
 * @see SavedVideo
 */
class SavedVideoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SavedVideo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SavedVideo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
