<?php

namespace ws\loewe\Utils\Common;

trait ValueObject {
    public function __get($memberName) {
      echo 123;
      if(!property_exists($this, $memberName)) {
        throw new \BadMethodCallException('Tried to __get inexisting property "'.get_class($this).'->'.$memberName.'"!');
      }

      return $this->$memberName;
    }
}