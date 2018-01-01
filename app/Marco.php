<?php

namespace App;

use closure;

class Marco
{
    protected $marcos;
    protected $data;

    public function __construct()
    {
        $this->data = 'bar';
    }

    public function __call($name, $args)
    {
        if ($this->marcos[$name] instanceof closure) {
            return $this->marcos[$name]->call($this, ...$args);
        }
    }

    public function marco(string $name, closure $function)
    {
        if (isset($this->marcos[$name])) {
            // TODO 回傳錯誤
            throw new Exception('name is invalid');
        }

        $this->marcos[$name] = $function;
    }
}
