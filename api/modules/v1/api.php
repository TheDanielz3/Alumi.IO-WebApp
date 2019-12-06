<?php

namespace api\modules\v1;

use yii\base\Module;

/**
 * api module definition class
 */
class api extends Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'api\modules\v1\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
