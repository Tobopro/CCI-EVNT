<?php

namespace Models;

abstract class Model
{
    protected array $changedFields = [];

    protected function setFields($name, $value)
    {
        if (property_exists($this, $name) and isset($this->$name) and $this->$name != $value) {
            $this->changedFields[] = $name;
        }
        $this->$name = $value;
    }
}