<?php

namespace app\lib;

class Request {
  public array $route_params = [];
  public array $query_params = [];
  public array $body = [];

  public function path() {
    $path = $_SERVER['REQUEST_URI'];
    if (!$path) return '/';
    $pos = strpos($path, '?');
    return $pos ? substr($path, 0, $pos) : $path;
  }

  public function query_string() {
    return $_SERVER['QUERY_STRING'] ?? null;
  }

  public function query_params() {
    foreach ($_GET as $key => $_) {
      $this->query_params[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    return $this->query_params;
  }

  public function method() {
    return $_SERVER['REQUEST_METHOD'];
  }

  public function route_params() {
    return $this->route_params;
  }

  public function body() {
    foreach ($_POST as $key => $_) {
      $this->body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    return $this->body;
  }
}
