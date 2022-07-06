<?php

namespace app\lib;

abstract class Component {
  public array $props;

  public function __construct(array $props) {
    $this->props = $props;

    echo $this;
  }

  abstract function render();

  function __toString() {
    $template = $this->render();

    foreach ($this->props as $key => $value) {
      $template = str_replace("{{$key}}", $value, $template);
    }

    return $template;
  }
}
