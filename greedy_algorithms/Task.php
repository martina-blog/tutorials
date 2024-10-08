<?php

class Task {
    public $name;
    public $deadline;
    public $duration;

    public function __construct($name, $deadline, $duration) {
        $this->name = $name;
        $this->deadline = $deadline;
        $this->duration = $duration;
    }
}