<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function guests_cannot_add_tasks_to_projects()
    {
        $project=factory("App\Project")->create();
        $this->post($project->path()."/tasks")->assertRedirect("login");
    }

    /** @test  */
    public function only_the_owner_of_a_project_may_add_tasks()
    {
        $this->signIn();
        $project=factory("App\Project")->create();
        $this->post($project->path."/tasks",["body"=>"Test Task"])->assertStatus(403);
    }


    /** @test  */
    public function a_project_can_have_tasks()
    {
        
        $this->signIn();
        

        $project=auth()->user()->projects()->create(factory("App\Project")->raw());

        $this->post($project->path().'/tasks',['body'=>'Test task']);
        $this->get($project->path())->assertSee("Test task");
    }

       /** @test */
       public function a_task_requires_a_body()
       {
           $this->signIn();
           $attributes=factory("App\Task")->raw(['body'=>'']);
           $project=auth()->user()->projects()->create(factory("App\Project")->raw());
           $this->post($project->path()."/tasks", $attributes)->assertSessionHasErrors('body');
       }

}
