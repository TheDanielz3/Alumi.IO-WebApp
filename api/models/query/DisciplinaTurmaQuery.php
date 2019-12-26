<?php

namespace api\models\query;

/**
 * This is the ActiveQuery class for [[\api\models\Disciplinaturma]].
 *
 * @see \api\models\Disciplinaturma
 */
class DisciplinaturmaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \api\models\Disciplinaturma[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\Disciplinaturma|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
