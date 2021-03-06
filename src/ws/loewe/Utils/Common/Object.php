<?php

namespace ws\loewe\Utils\Common;

trait Object {
    public function __get($memberName) {
      if(!property_exists($this, $memberName)) {
        throw new \BadMethodCallException('Tried to __get inexisting property "'.get_class($this).'->'.$memberName.'"!');
      }
    }

    public function __set($memberName, $value) {
      if(!property_exists($this, $memberName)) {
        throw new \BadMethodCallException('Tried to __set inexisting property "'.get_class($this).'->'.$memberName.'" to "'.$value.'"!');
      }
    }
}