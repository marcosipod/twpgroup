<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveLogRequest;
use App\Models\Log;
use App\Notifications\TaskCommented;
use Illuminate\Support\Facades\Notification;

class LogController extends Controller
{

    /**
     * Undocumented function
     *
     * @param Log $log
     */
    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaveLogRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveLogRequest $request)
    {
        $request->merge([
            'user_id' => auth()->user()->id
        ]);

        $log = $this->log->create($request->all());
        
        Notification::send($request->all(), new TaskCommented($log));

        return redirect()
            ->route('tasks.show', $request->task_id)
            ->with('success', 'Log created successfully!');
    }
}
