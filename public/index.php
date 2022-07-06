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
    'description' => 'A Very Minimal PHP Framework that is designed to create very simple applications or websites for small companies or individuals',
    'links' => ['tailwind' => 'https://tailwindcss.com/', 'typescript' => 'https://www.typescriptlang.org/']
  ]);
});

// Run app
$app->run();
