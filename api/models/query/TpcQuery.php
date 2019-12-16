<?php

namespace api\models\query;

/**
 * This is the ActiveQuery class for [[\api\models\Tpc]].
 *
 * @see \api\models\Tpc
 */
class TpcQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \api\models\Tpc[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\Tpc|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
