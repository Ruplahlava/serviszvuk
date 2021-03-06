<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
});

$app->get('/servis', function () use ($app) {
    return $app['twig']->render('servis.html.twig', array());
});

$app->get('/ozvuceni', function () use ($app) {
    return $app['twig']->render('ozvuceni.html.twig', array());
});

$app->get('/zakazkova-vyroba', function () use ($app) {
    return $app['twig']->render('zakazkova-vyroba.html.twig', array());
});

$app->get('/reference', function () use ($app) {
    return $app['twig']->render('reference.html.twig', array());
});

$app->get('/kontakt', function () use ($app) {
    return $app['twig']->render('kontakt.html.twig', array());
});


$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/' . $code . '.html.twig',
        'errors/' . substr($code, 0, 2) . 'x.html.twig',
        'errors/' . substr($code, 0, 1) . 'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
