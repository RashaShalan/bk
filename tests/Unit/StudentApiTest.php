<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class StudentApiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
     /** @test */
     public function all_student()
     {
         //Given we have task in the database
         $students = factory('App\students')->create();
 
         //When user visit the tasks page
         $response = $this->get('api/Student');
         
         //He should be able to read the task
         $response->assertSee($students->name);
     }

    public function authenticated_users_can_create_a_new_student()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create());
        //And a task object
        $student = factory('App\students')->make();
        //When user submits post request to create task endpoint
        $this->post('/api/Student/create',$task->student());
        //It gets stored in the database
        $this->assertEquals(1,student::all()->count());
    }

    /** @test */
    public function authorized_user_can_update_student(){

        //Given we have a signed in user
        $this->actingAs(factory('App\User')->create());
        //And a task which is created by the user
        $student = factory('App\students')->create(['user_id' => Auth::id()]);
        $student->title = "Updated Student";
        //When the user hit's the endpoint to update the task
        $this->put('/Api/Student/'.$task->id.'/edit', $task->toArray());
        //The task should be updated in the database.
        $this->assertDatabaseHas('students',['id'=> $student->id , 'title' => 'Updated Student']);

    }
    /** @test */
    public function authorized_user_can_delete_the_student(){

        //Given we have a signed in user
        $this->actingAs(factory('App\User')->create());
        //And a task which is created by the user
        $students = factory('App\students')->create(['user_id' => Auth::id()]);
        //When the user hit's the endpoint to delete the task
        $this->delete('/Student/'.$students->id);
        //The task should be deleted from the database.
        $this->assertDatabaseMissing('students',['id'=> $students->id]);

    }
}
