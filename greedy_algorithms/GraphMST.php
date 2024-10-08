<?php

class GraphMST {
    public $vertices;
    public $edges;

    public function __construct() {
        $this->vertices = array();
        $this->edges = array();
    }

    public function addVertex($vertex) {
        $this->vertices[] = $vertex;
        $this->edges[$vertex] = array();
    }

    public function addEdge($start, $end, $weight) {
        $this->edges[$start][] = array('end' => $end, 'weight' => $weight);
        $this->edges[$end][] = array('end' => $start, 'weight' => $weight); // for undirected graph
    }

    public function prim() {
        $visited = array();
        $resultEdges = array();

        $startVertex = $this->vertices[0];
        $visited[$startVertex] = true;

        while (count($visited) < count($this->vertices)) {
            $minEdge = $this->getMinEdge($visited);

            $resultEdges[] = $minEdge;
            $visited[$minEdge['end']] = true;
        }

        return $resultEdges;
    }

    private function getMinEdge($visited) {
        $minWeight = INF;
        $minEdge = null;

        foreach ($visited as $startVertex => $value) {
            foreach ($this->edges[$startVertex] as $edge) {
                if (!isset($visited[$edge['end']]) && $edge['weight'] < $minWeight) {
                    $minWeight = $edge['weight'];
                    $minEdge = $edge;
                }
            }
        }

        return $minEdge;
    }
}

// Example Usage
$graph = new GraphMST();

$graph->addVertex('A');
$graph->addVertex('B');
$graph->addVertex('C');
$graph->addVertex('D');

$graph->addEdge('A', 'B', 2);
$graph->addEdge('A', 'C', 1);
$graph->addEdge('B', 'C', 3);
$graph->addEdge('B', 'D', 4);
$graph->addEdge('C', 'D', 5);

$resultEdges = $graph->prim();

echo "Minimum Spanning Tree Edges:\n";
foreach ($resultEdges as $edge) {
    echo $edge['end'] . " --- " . $edge['weight'] . " --- " . $edge['start'] . "\n";
}