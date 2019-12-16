<?php

namespace api\models\query;

/**
 * This is the ActiveQuery class for [[\api\models\Encarregadoeducacao]].
 *
 * @see \api\models\Encarregadoeducacao
 */
class EncarregadoeducacaoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \api\models\Encarregadoeducacao[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\Encarregadoeducacao|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
