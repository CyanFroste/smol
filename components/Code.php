<?php

namespace app\components;

use app\lib\Component;

class Code extends Component {
  public function render() {
    return '<pre><code>{content}</code></pre>';
  }
}
