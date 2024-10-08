<?php

class Stack {
    private $stack;
    private $limit;

    public function __construct($limit = 10) {
        $this->stack = [];
        $this->limit = $limit;
    }

    public function push($item) {
        if (count($this->stack) < $this->limit) {
            array_unshift($this->stack, $item);
        } else {
            throw new RuntimeException('Stack overflow');
        }
    }

    public function pop() {
        if ($this->isEmpty()) {
            throw new RuntimeException('Stack underflow');
        } else {
            return array_shift($this->stack);
        }
    }

    public function top() {
        return current($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }

    public function size() {
        return count($this->stack);
    }
}

// Example usage
$stack = new Stack();
$stack->push('first');
$stack->push('second');
echo $stack->pop();  // Outputs: second
echo $stack->top();  // Outputs: first
?>