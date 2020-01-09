<?php

namespace api\models;

use app\mosquitto\phpMQTT;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%recado}}".
 *
 * @property int $id
 * @property string $topico
 * @property string $descricao
 * @property float $assinado
 * @property int $data_hora
 * @property int $id_disciplina_turma
 * @property int|null $id_aluno
 * @property int $id_professor
 *
 * @property Aluno $aluno
 * @property Professor $professor
 * @property Disciplinaturma $disciplinaTurma
 */
class Recado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%recado}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['topico', 'descricao', 'id_disciplina_turma'], 'required'],
            [['assinado'], 'number'],
            [['data_hora', 'id_disciplina_turma', 'id_aluno', 'id_professor'], 'integer'],
            [['topico'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 200],
            [['id_aluno'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['id_aluno' => 'id']],
            [['id_professor'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['id_professor' => 'id']],
            [['id_disciplina_turma'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplinaturma::className(), 'targetAttribute' => ['id_disciplina_turma' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'topico' => 'Topico',
            'descricao' => 'Descricao',
            'assinado' => 'Assinado',
            'data_hora' => 'Data Hora',
            'id_disciplina_turma' => 'Id Disciplina Turma',
            'id_aluno' => 'Id Aluno',
            'id_professor' => 'Id Professor',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'data_hora',
                'updatedAtAttribute' => false,
            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'id_professor',
                'updatedByAttribute' => false,
            ]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(Aluno::className(), ['id' => 'id_aluno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['id' => 'id_professor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaTurma()
    {
        return $this->hasOne(Disciplinaturma::className(), ['id' => 'id_disciplina_turma']);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\query\RecadoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \api\models\query\RecadoQuery(get_called_class());
    }

    public function getDataHora()
    {
        return Yii::$app->formatter->asRelativeTime($this->data_hora);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $myObj = new Recado();

        $myObj->id = $this->id;
        $myObj->topico = $this->topico;
        $myObj->descricao = $this->descricao;
        $myObj->assinado = $this->assinado;
        $myObj->data_hora = $this->data_hora;
        $myObj->id_disciplina_turma = $this->id_disciplina_turma;
        $myObj->id_aluno = $this->id_aluno;
        $myObj->id_professor = $this->id_professor;
        $myJSON = Json::encode($myObj);

        if($insert)
            $this->FazPublish("INSERT",$myJSON);
        else
            $this->FazPublish("UPDATE",$myJSON);
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $prod_id = $this->id;
        $myObj= new Recado();
        $myObj->id=$prod_id;
        $myJSON = Json::encode($myObj);
        $this->FazPublish("DELETE",$myJSON);
    }

    public function FazPublish($canal,$msg){
        $server = "127.0.0.1";
        $port = 1883;
        $username = ""; // set your username
        $password = ""; // set your password
        $client_id = uniqid(); // unique!
        $mqtt = new phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password))
        {
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        }
        else { file_put_contents("debug.output","Time out!"); }
    }

}
