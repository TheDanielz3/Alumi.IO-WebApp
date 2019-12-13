<?php

namespace api\models\query;

/**
 * This is the ActiveQuery class for [[\api\models\Recado]].
 *
 * @see \api\models\Recado
 */
class RecadoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \api\models\Recado[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\Recado|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
