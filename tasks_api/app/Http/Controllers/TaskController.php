<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Get a task
     *
     * @param Request $request
     * @param Task $task
     * @return JsonResponse
     */
    public function get(Request $request, Task $task): JsonResponse
    {
        return response()->json($task);
    }

    /**
     * Get all tasks
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json(Task::all());
    }

    /**
     * Add task
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Throwable
     */
    public function add(Request $request)
    {
        $validator = Validator::make($request->post(), [
            'name' => 'required|min:3|max:120',
            'priority' => 'required|in:low,medium,high',
            'description' => 'min:3|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $task = new Task();
            $task->name = $request->get('name');
            $task->priority = $request->get('priority');
            $task->completed = false;
            $task->description = $request->get('description');

            if ($task->saveOrFail()) {
                return response()->json($task);
            }

        } catch (Exception $e) {
            Log::debug('error creating task');
        }

        return response()->json('error_creating', 400);
    }


    /**
     * Update the task
     *
     * @param Request $request
     * @param Task $task
     * @return JsonResponse
     * @throws \Throwable
     */
    public function update(Request $request, Task $task): JsonResponse
    {
        $validator = Validator::make($request->post(), [
            'name' => 'min:3|max:120',
            'priority' => 'in:low,medium,high',
            'description' => 'min:3|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            if($request->has('name')){
                $task->name = $request->get('name');
            }
            if($request->has('priority')){
                $task->priority = $request->get('priority');
            }
            if($request->has('description')){
                $task->description = $request->get('description');
            }

            if ($task->updateOrFail()) {
                return response()->json($task);
            }

        } catch (Exception $e) {
            Log::debug('error updating task', ['id' => $task->id]);
        }

        return response()->json('error_updating', 400);
    }

    /**
     * Remove task
     *
     * @param Request $request
     * @param Task $task
     * @return JsonResponse
     */
    public function remove(Request $request, Task $task): JsonResponse
    {
        if ($task->delete()) {
            return response()->json(null, 204);
        }

        return response()->json('error_removing', 400);
    }

    /**
     * Complete the task
     *
     * @param Request $request
     * @param Task $task
     * @return JsonResponse
     * @throws \Throwable
     */
    public function complete(Request $request, Task $task): JsonResponse
    {
        try {
            $task->completed = true;
            if ($task->saveOrFail()) {
                return response()->json(null, 204);
            }
        } catch (Exception $e) {
            Log::debug('error completing task.', ['id' => $task->id]);
        }

        return response()->json('error_completing', 400);
    }
}
