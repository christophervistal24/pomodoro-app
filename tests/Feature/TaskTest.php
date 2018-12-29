<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Task;
use Carbon\Carbon;

class TaskTest extends TestCase
{
    protected $task;
    public function setUp()
    {
        parent::setUp();
        $this->task = new Task;
        // $this->task = factory(Task::class)->create();
    }
    /**
     * [it_can_store_task_and_time description]
     * @test
     * @return [type] [description]
     */
    public function it_can_store_task()
    {
        $data = ['name' => 'Design in Quick Guess','time_end' => Carbon::now()];
        $task = $this->task->addTask($data);
        $this->assertEquals(1,$task->count());
    }

    /**
     * [it_can_update_a_task_and_time description]
     * @test
     * @return [type] [description]
     */
    public function it_can_update_a_task()
    {
        $task = factory(Task::class)->create();
        $new_data = ['name' => 'Simple Design','time_end' => Carbon::now()];
        $updated = $task->updateTask($task , $new_data);
        $this->assertEquals($new_data['name'],$updated['name']);
    }

    /**
     * [it_can_delete_a_task description]
     * @test
     * @return [type] [description]
     */
    public function it_can_delete_a_task()
    {
        $task = factory(Task::class)->create();
        $this->assertTrue($task->deleteTask($task));
    }

    /**
     * [it_can_get_all_task description]
     * @test
     * @return [type] [description]
     */
    public function it_can_get_all_task()
    {
        $task = factory(Task::class,20)->create();
        $allTask = $this->task->getAllTask();
        $this->assertEquals($task->count(),$allTask->count());
    }

    /**
     * [it_can_show_one_task description]
     * @test
     * @return [type] [description]
     */
    public function it_can_show_one_task()
    {
        $task = factory(Task::class)->create();
        $fetchedTask = $this->task->findTask($task->id);
        $this->assertEquals($task->name,$fetchedTask->name);
    }
}
