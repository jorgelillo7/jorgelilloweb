<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('index.twig', array('activeTab' => 0));
});

$app->get('/alt', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('index2.twig', array('activeTab' => 0));
});

$app->get('/portfolio', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('portfolio.twig', array('activeTab'=> 1));
});

$app->get('/services', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('services.twig', array('activeTab'=> 2));
});

$app->get('/about', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('about.twig', array('activeTab'=> 3));
});

$app->get('/contact', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('contact.twig', array('activeTab'=> 4));
});

$app->get('/pricing', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('pricing-tables.twig', array('activeTab'=> 5));
});

$app->run();
