<?php

namespace App\Http\Controllers;

use App\Models\AssignToDo;
use App\Models\ToDo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ToDo::join('assign_to_dos', 'to_dos.id', '=', 'assign_to_dos.task_id')
                    ->join('employees', 'assign_to_dos.employee_id', '=', 'employees.id')
                    ->where('to_dos.status', null)->orderBy('to_dos.created_at', 'DESC')->get();
    }

    public function inProgress()
    {
        return ToDo::join('assign_to_dos', 'to_dos.id', '=', 'assign_to_dos.task_id')
                    ->join('employees', 'assign_to_dos.employee_id', '=', 'employees.id')
                    ->where('to_dos.status', 'in-progress')->orderBy('to_dos.updated_at', 'DESC')->get();
    }

    public function done()
    {
        return ToDo::join('assign_to_dos', 'to_dos.id', '=', 'assign_to_dos.task_id')
                    ->join('employees', 'assign_to_dos.employee_id', '=', 'employees.id')
                    ->where('to_dos.status', 'done')->orderBy('to_dos.completed_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task_id = ToDo::insertGetId([
            'tasks' => $request->todo['task']
        ]);

        $todo = AssignToDo::create([
            'task_id' => $task_id,
            'employee_id' => $request->todo['emp_id']
        ]);

        return $todo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);

        if($todo)
        {
            $todo->status = 'done';
            $todo->completed = true;
            $todo->completed_at = Carbon::now();
            $todo->save();

            return $todo;
        }

        return 'ToDo not found!';
    }

    public function updateStatus(Request $request, $id)
    {
        $todo = Todo::find($id);

        if($todo)
        {
            $todo->status = 'in-progress';
            $todo->save();

            return $todo;
        }

        return 'ToDo not found!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $assignToDo = AssignToDo::find($id);

        if($todo && $assignToDo)
        {
            $todo->delete();
            
            return "Deleted successfully";
        }

        return 'ToDo not found!';
    }
}
