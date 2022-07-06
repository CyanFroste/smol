<?php

namespace app\controllers;

use app\lib\Request;
use app\lib\Response;

class ExampleController {
  public static function example(Request $request, Response $response) {
    $response->render('pages/example', [
      'title' => 'Smol App',
      'welcome_message' => 'Welcome to Smol'
    ]);
  }
}
