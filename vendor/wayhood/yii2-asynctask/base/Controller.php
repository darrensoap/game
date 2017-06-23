<?php
/**
 * @link http://www.wayhood.com/
 */

namespace wh\asynctask\base;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * Class Controller
 * @package wh\asynctask\base
 * @author Song Yeung <netyum@163.com>
 * @date 12/20/14
 */
class Controller extends \yii\web\Controller
{
    public $layout = 'main';

    public $queue = null;

    public function init()
    {
        parent::init();

        $this->queue = Yii::createObject([
            'class' => 'wh\asynctask\Queue',
            'redis' => $this->module->redis
        ]);
    }
} 