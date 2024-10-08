<?php

class Node {
    public $data;
    public $frequency;
    public $left;
    public $right;

    public function __construct($data, $frequency, $left = null, $right = null) {
        $this->data = $data;
        $this->frequency = $frequency;
        $this->left = $left;
        $this->right = $right;
    }
}