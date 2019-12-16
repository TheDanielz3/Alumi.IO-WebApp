<?php

namespace api\models\query;

/**
 * This is the ActiveQuery class for [[\api\models\Disciplina]].
 *
 * @see \api\models\Disciplina
 */
class DisciplinaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \api\models\Disciplina[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\Disciplina|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
