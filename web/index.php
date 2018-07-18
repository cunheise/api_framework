<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/17
 * Time: 13:25
 */

use App\AspectKernel;
use Silex\Application;

require dirname(__DIR__) . '/vendor/autoload.php';
$app = new Application();
require dirname(__DIR__) . '/config/config.php';
require dirname(__DIR__) . '/config/constants.php';
require dirname(__DIR__) . '/config/router.php';
AspectKernel::getInstance()->init($app['aspect.options']);
$app->run();