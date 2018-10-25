<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use App\Http\Requests\RequestsUser;
use  Brian2694\Toastr\Facades\Toastr;
class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $tasks = $request->user()->tasks()->get();
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function store(RequestsUser $request)
    {
         $tasks = $request->user()->tasks()->create([
            'name' => $request->name,
        ]);
        Toastr::success(trans('message.successfully_adding'), trans('message.notification'), ["positionClass" => "toast-top-right"]);

        return redirect('/tasks');
    }

    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
        Toastr::error(trans('message.successfully_delete') , trans('message.notification'), ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function edit(Request $request, Task $task)
    {
        return view('tasks.update', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        Toastr::success(trans('message.successfully_update') , trans('message.notification'), ["positionClass" => "toast-top-right"]);
        return back();
    }
}
