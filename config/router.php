<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/17
 * Time: 13:32
 */

use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app->get('/', function (Application $app) {
    return new Response($app['app.name']);
});
$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    return new JsonResponse(['data' => [], 'message' => $e->getMessage(), 'code' => $code], $code);
});
$app->before(function (Request $request, Application $app) {
    if (strpos($request->headers->get('Content-Type'), 'application/json') === 0) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : []);
    }
});