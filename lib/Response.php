<?php

namespace app\lib;

class Response {
  public function status(int $code) {
    http_response_code($code);
  }

  public function render(string $view, $params = []) {
    ob_start();
    include_once Application::$VIEWS . 'layouts/main.php';
    $layout = ob_get_clean();

    foreach ($params as $key => $value) {
      $$key = $value;
    }

    ob_start();
    include_once Application::$VIEWS . "$view.php";
    $view = ob_get_clean();

    echo str_replace('{{ content }}', $view, $layout);
  }

  public function json(array $data) {
    ob_clean();
    header_remove();
    header('Content-type: application/json');
    http_response_code(200);

    echo json_encode($data);
  }
}
