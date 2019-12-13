<?php

namespace api\models\query;

/**
 * This is the ActiveQuery class for [[\api\models\Professor]].
 *
 * @see \api\models\Professor
 */
class ProfessorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \api\models\Professor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\Professor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
