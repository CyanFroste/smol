<?php

namespace app\lib;

class Router {
  public array $routes = [];
  public Request $request;
  public Response $response;

  public function __construct(Request $request, Response $response) {
    $this->request = $request;
    $this->response = $response;
  }

  public function get(string $path, callable $callback) {
    $this->routes['GET'][$path] = $callback;
  }

  public function post(string $path, callable $callback) {
    $this->routes['POST'][$path] = $callback;
  }

  private function map_route_params(string $path, array $matches) {
    $params = [];
    $filtered = [];

    foreach (explode('/', $path) as $fragment) {
      if (str_starts_with($fragment, ':')) array_push($filtered, substr($fragment, 1));
    }

    foreach ($filtered as $index => $key) {
      $params[$key] = $matches[$index];
    }

    return $params;
  }

  public function resolve() {
    $path = $this->request->path();
    $method = $this->request->method();
    $callback = $this->routes[$method][$path] ?? null;

    if (!$callback) {
      // Ref: https://stackoverflow.com/questions/20433870/php-route-parser-end-of-the-url
      foreach (array_keys($this->routes[$method]) as $route) {
        $matches = [];
        // convert urls like '/users/:uid/posts/:pid' to regular expression      
        $pattern = "@^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($route)) . "$@D";

        if (preg_match($pattern, $path, $matches)) {
          // remove the first match as it will be the whole path name
          array_shift($matches);

          $this->request->route_params = $this->map_route_params($route, $matches);
          $callback = $this->routes[$method][$route] ?? null;
          return $callback($this->request, $this->response);
        }
      }

      $this->response->status(404);
      return $this->response->render('pages/not_found');
    }

    $callback($this->request, $this->response);
  }
}
