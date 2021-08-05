<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $task;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $user;

    /**
     * Undocumented function
     *
     * @param Task $task Taks model instance
     */
    public function __construct(Task $task, User $user)
    {
        $this->task = $task;
        $this->user = $user;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $tasks = $this->task->orderBy('created_at', 'DESC')->simplePaginate(5);
            
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function create()
    {
        $users = $this->user->all();
        $form = route('tasks.store');
        $method = "post";
        
        return view('tasks.form', compact('users', 'form', 'method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Task\SaveTaskRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveTaskRequest $request)
    {
        $request->merge([
            'user_id' => $request->user_id ?? auth()->user()->id
        ]);

        $this->task->create($request->all());
        
        return redirect()
            ->route('tasks.index')
            ->with('success', 'Item created successfully!');
    }

    /**
     * Undocumented function
     *
     * @param Task $task
     * @return void
     */
    public function show($id)
    {
        $task = $this->task->find($id);
        if (!$task) {
            //alert()->error('Error','Task no encontrada.');
            return redirect()->route('tasks.index');
        }
                
        return view('tasks.show', compact('task'));
    }
    
    /**
     * Undocumented function
     *
     * @param Task $task
     * @return void
     */
    public function edit($id)
    {
        $task = $this->task->find($id);
        
        if (!$task) {
            //alert()->error('Error','Task no encontrada.');
            return redirect()->route('tasks.index');
        }
        
        $users = $this->user->all();
        $form = route('tasks.update', $id);
        $method = "patch";

        return view('tasks.form', compact('users', 'task', 'form', 'method'));
    }

    /**
     * Undocumented function
     *
     * @param UpdateTaskRequest $request
     * @param [type] $id
     * @return void
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        $task = $this->task->find($id);
        dd($task);
        if (!$task) {
            //alert()->error('Error','Task no encontrada.');
            return redirect()->route('tasks.index');
        }
        dump($task);
        $task->update($request->all());

        //alert()->success('task actualizada','Exitosamente!!!');
        return redirect()->route('tasks.index');
    }

    /**
     * Undocumented function
     *
     * @param Task $task
     * @return void
     */
    public function destroy(Task $task)
    {
        if (!$task) {
            //alert()->error('Error', 'categoria no encontrada.');
            return redirect()->route('tasks.index');
        }
        $task->delete();
        
        return redirect()->route('tasks.index');
    }
}
