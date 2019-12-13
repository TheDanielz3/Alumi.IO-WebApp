<?php

namespace api\models\query;

/**
 * This is the ActiveQuery class for [[\api\models\Aluno]].
 *
 * @see \api\models\Aluno
 */
class AlunoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \api\models\Aluno[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\Aluno|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
