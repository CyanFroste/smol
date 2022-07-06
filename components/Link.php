<?php

namespace app\components;

use app\lib\Component;

class Link extends Component {
  public function render() {
    return '<a href={to} class="text-amber-500">{name}</a>';
  }
}
