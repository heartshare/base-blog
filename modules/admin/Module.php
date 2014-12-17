<?php

namespace app\modules\admin;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\admin\controllers';
    public $layout = 'main';
    public $defaultRoute = 'post';

    public function init()
    {
        parent::init();
        Yii::configure($this, require(__DIR__ . '/config.php'));
    }
}
