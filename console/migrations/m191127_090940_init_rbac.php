<?php

use yii\db\Migration;

/**
 * Class m191127_090940_init_rbac
 */
class m191127_090940_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     * @throws Exception
     */
    public function safeUp()
    {
                $auth = Yii::$app->authManager;

                // add "createHomework" permission
                $createHomework = $auth->createPermission('createHomework');
                $createHomework->description = 'Create a homework';
                $auth->add($createHomework);

                // add "updateHomework" permission
                $updateHomework = $auth->createPermission('updateHomework');
                $updateHomework->description = 'Update homework';
                $auth->add($updateHomework);

                // add "deleteHomework" permission
                $deleteHomework = $auth->createPermission('deleteHomework');
                $deleteHomework->description = 'Delete homework';
                $auth->add($deleteHomework);

                // add "viewHomework" permission
                $viewHomework = $auth->createPermission('viewHomework');
                $viewHomework->description = 'View homework';
                $auth->add($viewHomework);

                // add "createTests" permission
                $createTests = $auth->createPermission('createTests');
                $createTests->description = 'Create a tests';
                $auth->add($createTests);

                // add "updateTests" permission
                $updateTests = $auth->createPermission('updateTests');
                $updateTests->description = 'Update tests';
                $auth->add($updateTests);

                // add "deleteTests" permission
                $deleteTests = $auth->createPermission('deleteTests');
                $deleteTests->description = 'Delete tests';
                $auth->add($deleteTests);

                // add "viewTests" permission
                $viewTests = $auth->createPermission('viewTests');
                $viewTests->description = 'View tests';
                $auth->add($viewTests);
                
                 // add "createErrands" permission
                $createErrands = $auth->createPermission('createErrands');
                $createErrands->description = 'Create a errands';
                $auth->add($createErrands);

                // add "updateErrands" permission
                $updateErrands = $auth->createPermission('updateErrands');
                $updateErrands->description = 'Update errands';
                $auth->add($updateErrands);

                // add "deleteErrands" permission
                $deleteErrands = $auth->createPermission('deleteErrands');
                $deleteErrands->description = 'Delete errands';
                $auth->add($deleteErrands);

                // add "viewErrands" permission
                $viewErrands = $auth->createPermission('viewErrands');
                $viewErrands->description = 'View Errands';
                $auth->add($viewErrands);

                // add "backendAccess" permission
                $backendAccess = $auth->createPermission('backendAccess');
                $backendAccess->description = 'Grants access to the backend';
                $auth->add($backendAccess);

                // add "student" role and give the permissions bellow
                $student= $auth->createRole('student');
                $auth->add($student);
                $auth->addChild($student, $viewHomework);
                $auth->addChild($student, $viewTests);

                // add "teacher" role and give the permissions bellow
                $teacher = $auth->createRole('teacher');
                $auth->add($teacher);
                $auth->addChild($teacher, $viewHomework);
                $auth->addChild($teacher, $viewTests);
                $auth->addChild($teacher, $viewErrands);
                $auth->addChild($teacher, $createHomework);
                $auth->addChild($teacher, $createTests);
                $auth->addChild($teacher, $createErrands);
                $auth->addChild($teacher, $updateHomework);
                $auth->addChild($teacher, $updateTests);
                $auth->addChild($teacher, $updateErrands);
                $auth->addChild($teacher, $deleteHomework);
                $auth->addChild($teacher, $deleteTests);
                $auth->addChild($teacher, $deleteErrands);

                // add "guardian" role and give the permissions bellow
                $guardian= $auth->createRole('guardian');
                $auth->add($guardian);
                $auth->addChild($guardian, $viewHomework);
                $auth->addChild($guardian, $viewTests);
                $auth->addChild($guardian, $viewErrands);

                // add "admin" role and give the permissions bellow
                $admin= $auth->createRole('admin');
                $auth->add($admin);
                $auth->addChild($admin, $viewHomework);
                $auth->addChild($admin, $viewTests);
                $auth->addChild($admin, $viewErrands);
                $auth->addChild($admin, $createHomework);
                $auth->addChild($admin, $createTests);
                $auth->addChild($admin, $createErrands);
                $auth->addChild($admin, $updateHomework);
                $auth->addChild($admin, $updateTests);
                $auth->addChild($admin, $updateErrands);
                $auth->addChild($admin, $deleteHomework);
                $auth->addChild($admin, $deleteTests);
                $auth->addChild($admin, $deleteErrands);
                $auth->addChild($admin, $backendAccess);

                //Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
                //usually implemented in your User model.
                //$auth->assign($, 2);
                //$auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
         $auth = Yii::$app->authManager;

         $auth->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191127_090940_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
