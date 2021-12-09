<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ToDo;
use App\Models\Employee;

class AssignToDo extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'employee_id'
    ];

    public function todo()
    {
        return $this->belongsTo(ToDo::class, 'id', 'task_id');
    }

    public function assign()
    {
        return $this->belongsTo(Employee::class, 'id', 'employee_id');
    }
}
