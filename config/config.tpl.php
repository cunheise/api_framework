<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/17
 * Time: 13:28
 */

use Medoo\Medoo;
use Silex\Provider\MonologServiceProvider;

$app['debug'] = DEBUG;
$app['app.name'] = 'Application Name';
$app['app.path'] = dirname(__DIR__);
$app->register(new MonologServiceProvider(), ['monolog.logfile' => $app['app.path'] . '/runtime/log/app.log']);
$app['aspect.options'] = [
    'diContainer' => $app,
    'debug' => $app['debug'],
    'appDir' => $app['app.path'],
    'cacheDir' => $app['app.path'] . '/runtime/cache/aspect',
    'includePaths' => [$app['app.path'] . '/src/']
];
$app['db.options'] = [
    'database_type' => 'mysql',
    'database_name' => 'database_name',
    'server' => 'server',
    'username' => 'username',
    'password' => 'password',
    'charset' => 'utf8',
    'prefix' => 'destoon_',
    'port' => 'port',
    'logging' => $app['debug'],
];
$app['db'] = function ($c) {
    return new Medoo($c['db.options']);
};