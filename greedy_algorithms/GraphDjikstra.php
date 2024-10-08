<?php

class GraphDjikstra {
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

    public function dijkstra($start) {
        $distances = array();
        $previous = array();
        $unvisited = array();

        foreach ($this->vertices as $vertex) {
            $distances[$vertex] = INF;
            $previous[$vertex] = null;
            $unvisited[$vertex] = true;
        }

        $distances[$start] = 0;

        while (!empty($unvisited)) {
            $minVertex = $this->getMinDistanceVertex($distances, $unvisited);
            unset($unvisited[$minVertex]);

            foreach ($this->edges[$minVertex] as $edge) {
                $alt = $distances[$minVertex] + $edge['weight'];
                if ($alt < $distances[$edge['end']]) {
                    $distances[$edge['end']] = $alt;
                    $previous[$edge['end']] = $minVertex;
                }
            }
        }

        return array('distances' => $distances, 'previous' => $previous);
    }

    private function getMinDistanceVertex($distances, $unvisited) {
        $min = INF;
        $minVertex = null;

        foreach ($unvisited as $vertex => $value) {
            if ($distances[$vertex] < $min) {
                $min = $distances[$vertex];
                $minVertex = $vertex;
            }
        }

        return $minVertex;
    }

    public function getShortestPath($start, $end) {
        $result = $this->dijkstra($start);
        $distances = $result['distances'];
        $previous = $result['previous'];

        $path = array();
        $current = $end;

        while ($current !== null) {
            $path[] = $current;
            $current = $previous[$current];
        }

        $path = array_reverse($path);

        return array('path' => $path, 'distance' => $distances[$end]);
    }
}

// Example Usage
$graph = new GraphDjikstra();

$graph->addVertex('A');
$graph->addVertex('B');
$graph->addVertex('C');
$graph->addVertex('D');
$graph->addVertex('E');

$graph->addEdge('A', 'B', 2);
$graph->addEdge('A', 'C', 4);
$graph->addEdge('B', 'C', 1);
$graph->addEdge('B', 'D', 7);
$graph->addEdge('C', 'E', 3);
$graph->addEdge('D', 'E', 1);

$result = $graph->getShortestPath('A', 'E');

echo "Shortest Path: " . implode(' -> ', $result['path']) . "\n";
echo "Total Distance: " . $result['distance'] . "\n";