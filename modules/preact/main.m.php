<?php
return new class {
    public $root;
    public function render($component){
        $this->root = $component;
    }
};