<?php

namespace ws\loewe\Utils\IO;

use Exception;

class IOException extends Exception {

  public function __construct($message, $code = null, $previous = null) {
    parent::__construct($message, $code, $previous);
  }
}
