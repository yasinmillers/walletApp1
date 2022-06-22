<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Comments]].
 *
 * @see Comments
 */
class CommentsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Comments[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Comments|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
