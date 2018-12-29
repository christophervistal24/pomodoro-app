<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    protected $fillable =  ['name','time_end'];

    public function addTask(array $data)
    {
       return $this->create($data);
    }

    public function updateTask(Task $task , array $data)
    {
        $task = $this->findOrFail($task->id);
        $task->name = $data['name'];
        $task->time_end = $data['time_end'];
        $task->save();
        return $task;
    }

    public function deleteTask(Task $task)
    {
        return $this->delete($task->id);
    }

    public function findTask(int $id)
    {
        return $this->findOrFail($id);
    }

    public function getAllTask()
    {
        return $this->get();
    }

}
