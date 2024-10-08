<?php

class HuffmanCoding {
    public $root;

    public function buildHuffmanTree($data, $frequency) {
        $priorityQueue = new SplPriorityQueue();

        // Create nodes for each character and its frequency
        foreach ($data as $index => $char) {
            $node = new Node($char, $frequency[$index]);
            $priorityQueue->insert($node, -$frequency[$index]); // negative priority for min heap
        }

        // Build Huffman tree
        while ($priorityQueue->count() > 1) {
            $left = $priorityQueue->extract();
            $right = $priorityQueue->extract();

            $parent = new Node(null, $left->frequency + $right->frequency, $left, $right);
            $priorityQueue->insert($parent, -$parent->frequency);
        }

        $this->root = $priorityQueue->extract();
    }

    public function buildHuffmanCodes($node, $currentCode = '') {
        $codes = array();

        if ($node->data !== null) {
            $codes[$node->data] = $currentCode;
        }

        if ($node->left !== null) {
            $codes = array_merge($codes, $this->buildHuffmanCodes($node->left, $currentCode . '0'));
        }

        if ($node->right !== null) {
            $codes = array_merge($codes, $this->buildHuffmanCodes($node->right, $currentCode . '1'));
        }

        return $codes;
    }
}

// Example Usage
$data = ['a', 'b', 'c', 'd', 'e', 'f'];
$frequency = [5, 9, 12, 13, 16, 45];

$huffmanCoding = new HuffmanCoding();
$huffmanCoding->buildHuffmanTree($data, $frequency);
$huffmanCodes = $huffmanCoding->buildHuffmanCodes($huffmanCoding->root);

echo "Huffman Codes:\n";
foreach ($huffmanCodes as $char => $code) {
    echo "$char: $code\n";
}