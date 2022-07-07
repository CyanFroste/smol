<?php
// Reference: https://www.youtube.com/c/TheCodeholic

require_once __DIR__ . '/../vendor/autoload.php';

use app\lib\Application;
use app\lib\Request;
use app\lib\Response;

// Your Controllers
use app\controllers\ExampleController;

$app = new Application(dirname(__DIR__));

// Routes
$app->router->get('/', [ExampleController::class, 'example']);

$app->router->get('/api/example', function (Request $request, Response $response) {
  $response->json([
    'version' => '1.0.1',
    'links' => ['tailwind' => 'https://tailwindcss.com/', 'typescript' => 'https://www.typescriptlang.org/']
  ]);
});

// Run app
$app->run();
