<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageProjectTest extends TestCase
{
    use WithFaker,RefreshDatabase;

    /** @test */

    public function guests_cannot_projects()
    {
        $attributes=factory("App\Project")->raw();
        $this->post("/projects",$attributes)->assertRedirect("login");
    }

        /** @test */
    public function guests_cannot_view_projects()
    {
        $this->get("/home")->assertRedirect('login');
    }

        /** @test */
    public function guests_cannot_view_a_single_project()
    {
        $project=factory("App\Project")->create();
        $this->get($project->path())->assertRedirect("login");
    }

        /** @test */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory("App\User")->create());   
        
        $this->get("/projects/create")->assertStatus(200);

        $attributes=[
            'title'=>$this->faker->sentence,
            'description'=>$this->faker->paragraph,
        ];

        $this->post("/projects",$attributes)->assertRedirect("/home");
    }

    /** @test */
    public function a_project_requires_a_title()
    {
        $this->actingAs(factory("App\User")->create());
        $attributes=factory("App\Project")->raw(['title'=>'']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }
    
    /** @test */
    public function a_project_requires_a_description()
    {
        $this->actingAs(factory("App\User")->create());
        $attributes=factory("App\Project")->raw(['description'=>'']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    public function a_project_requires_an_owner()
    {
        
        $attributes=factory("App\Project")->raw();
        $this->post("/projects",$attributes)
        ->assertRedirect("login");
    }


    /** @test */
    public function a_user_can_view_their_project()
    {
        $this->withoutExceptionHandling();
        $this->be(factory("App\User")->create());
        $project=factory("App\Project")->create(['owner_id'=>auth()->id()]);
        $this->get("/project/".$project->id)
        ->assertSee($project->title)
        ->assertSee($project->description);
    }

    /** @test */
    public function an_authenicated_user_cannot_view_other_users_project()
    {
        $this->be(factory("App\User")->create());
        $project=factory("App\Project")->create();
        $this->get($project->path())->assertStatus(403);
    }

}
