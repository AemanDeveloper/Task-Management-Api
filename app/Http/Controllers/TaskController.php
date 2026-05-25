<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Http\Resources\TaskResource;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
   public function index(Request $request)
    {
        $query = Task::query();

        if ($request->status) {
            $query->where(
                'status',
                $request->status
            );
        }

        if ($request->search) {
            $query->where(
                'title',
                'like',
                '%' . $request->search . '%'
            );
        }

        $tasks = $query
            ->latest()
            ->paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Tasks fetched successfully',
            'data' => $tasks
        ]);
    }

    public function store(
        StoreTaskRequest $request,
        TaskService $taskService
    ) {
        try {

            $task = $taskService->createTask(
                $request->validated()
            );

            return response()->json([
                'success' => true,
                'message' => 'Task created successfully',
                'data' => new TaskResource($task)
            ], 201);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 422);

        }
    }

    public function show(Task $task)
    {
        return response()->json([
            'success' => true,
            'data' => new TaskResource($task)
        ]);
    }

    public function update(
        UpdateTaskRequest $request,
        Task $task
    ) {
        $task->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Task updated successfully',
            'data' => new TaskResource($task->fresh())
        ]);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully'
        ]);
    }
}