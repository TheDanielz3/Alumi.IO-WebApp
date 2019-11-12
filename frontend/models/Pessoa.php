<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pessoa".
 *
 * @property int $id
 * @property string $nome
 * @property int $idade
 * @property string $morada
 * @property string $email
 * @property int $NIF
 */
class Pessoa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pessoa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'idade', 'morada', 'email', 'NIF'], 'required'],
            [['idade', 'NIF'], 'integer'],
            [['nome'], 'string', 'max' => 80],
            [['morada'], 'string', 'max' => 10],
            [['email'],'email','max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'idade' => 'Idade',
            'morada' => 'Morada',
            'email' => 'Email',
            'NIF' => 'Nif',
        ];
    }
}
