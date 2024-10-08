<?php

class Scheduler {
    public $tasks = array();

    public function addTask($name, $deadline, $duration) {
        $task = new Task($name, $deadline, $duration);
        $this->tasks[] = $task;
    }

    public function scheduleTasks() {
        // Sort tasks by deadline in ascending order
        usort($this->tasks, function ($a, $b) {
            return $a->deadline - $b->deadline;
        });

        $schedule = array();
        $current_time = 0;

        foreach ($this->tasks as $task) {
            // Check if the task can be scheduled without missing the deadline
            if ($current_time + $task->duration <= $task->deadline) {
                $schedule[] = $task->name;
                $current_time += $task->duration;
            }
        }

        return $schedule;
    }
}

// Example Usage
$scheduler = new Scheduler();
$scheduler->addTask("Task A", 3, 2);
$scheduler->addTask("Task B", 5, 1);
$scheduler->addTask("Task C", 2, 4);

$schedule = $scheduler->scheduleTasks();

echo "Scheduled Tasks: " . implode(", ", $schedule) . "\n";