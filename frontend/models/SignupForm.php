<?php

namespace frontend\models;

use app\models\Aluno;
use app\models\Encarregadoeducacao;
use app\models\Professor;
use Yii;
use yii\base\Model;
use common\models\User;
use yii\db\Exception;
use yii\helpers\BaseVarDumper;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $user_type;
    public $nome;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['user_type', 'required'],

            ['nome', 'trim'],
            ['nome', 'required'],
            ['nome', 'string', 'min' => 2, 'max' => 255],

        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     * @throws \Exception
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $auth = Yii::$app->authManager;
        $UserNewRole = $auth->getRole($this->user_type);

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $user->save();

        try {

            $auth->assign($UserNewRole, $user->id);

            if ($this->user_type == 'student') {
                $userSecondaryTable = new Aluno();
            } elseif ($this->user_type == 'teacher') {
                $userSecondaryTable = new Professor();
            } elseif ($this->user_type == 'guardian') {
                $userSecondaryTable = new EncarregadoEducacao();
            }

            $userSecondaryTable->id = $user->id;
            $userSecondaryTable->nome = $this->nome;
            $userSecondaryTable->save();

        } catch (\Exception $e) {
            BaseVarDumper::dump($e);
            exit();
        }

        return $user->save() && $this->sendEmail($user);
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
