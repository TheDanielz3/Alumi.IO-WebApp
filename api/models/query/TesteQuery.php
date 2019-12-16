<?php

namespace api\models\query;

/**
 * This is the ActiveQuery class for [[\api\models\Teste]].
 *
 * @see \api\models\Teste
 */
class TesteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \api\models\Teste[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\Teste|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
