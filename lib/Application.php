<?php

namespace app\lib;

class Application {
  /** Root Path */
  public static string $ROOT;
  /** Path to Views */
  public static string $VIEWS;
  /** Path to Resources */
  public static string $RESOURCES;

  public Router $router;
  public Request $request;
  public Response $response;

  public function __construct(string $root) {
    self::$ROOT = $root;
    self::$VIEWS = $root . '/views/';
    self::$RESOURCES = $root . '/resources/';

    $this->request = new Request();
    $this->response = new Response();
    $this->router = new Router($this->request, $this->response);
  }

  public function run() {
    $this->router->resolve();
  }
}
