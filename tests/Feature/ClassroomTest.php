<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassroomTest extends TestCase
{

    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_000_00_getClassroomNormal()
    {
        $acc = $this->CreateAccount();
        $this->be($acc);
        
        \App\Classroom::create([
            "classname" => "1",
        ]);
        
        $response = $this->get('/classroom');

        $response->assertStatus(200);
        
        $this->assertTrue($response->json("items") != null);

        
    }

    public function test_000_01_getClassroomWithoutLogin()
    {
        $response = $this->get('/classroom');
        $response->assertRedirect('/response');

        $this->followRedirects($response)->assertStatus(401);
        $this->followRedirects($response)->assertExactJson([
            "message" => "Unauthorized"
        ]);
        
    }
    
    public function test_000_02_getClassroomWithLoginButStatusBlock()
    {
        $data = [
            "username" => "admin",
            "type" => "adm",
            "status" => "blo"
        ];
        $acc = $this->CreateAccount($data, true);
        $this->be($acc);
        
        $response = $this->get('/classroom');
        $response->assertStatus(403);
        $response->assertExactJson([
            "message" => "this account is block"
        ]);
        
    }

    public function test_000_03_getClassroomWithLoginButTypeStudent()
    {
        $data = [
            "username" => "student",
            "type" => "stu",
            "status" => "acc"
        ];
        $acc = $this->CreateAccount($data, true);
        $this->be($acc);
        
        $response = $this->get('/classroom');
        
        $response->assertStatus(401);
        $response->assertExactJson([
            "message" => "this account is not unauthorized"
        ]);
        
    }

    public function test_001_00_createClassroomNormal()
    {
        $acc = $this->CreateAccount();
        $this->be($acc);

        $param = [
            "classname" => "1"
        ];

        $response = $this->post('/createclassroom', $param);
        
        $response->assertStatus(201);
        $response->assertExactJson([
            "message" => "Create Success"
        ]);

        tap(\App\Classroom::first(), function ($classroom) {
            $this->assertEquals("1", $classroom->classname);
        });
        
    }

    public function test_002_00_updateClassroomNormal()
    {
        $acc = $this->CreateAccount();
        $this->be($acc);

        \App\Classroom::create([
            "classname" => "1",
        ]);

        tap(\App\Classroom::first(), function ($classroom) {
            $this->assertEquals("1", $classroom->classname);
        });

        $param = [
            "classname" => "2"
        ];

        $response = $this->put('/updclassroom/1', $param);
        
        $response->assertStatus(200);
        $this->assertTrue($response->json("items") != null);

        tap(\App\Classroom::first(), function ($classroom) {
            $this->assertEquals("2", $classroom->classname);
        });
        
    }

    public function test_003_00_deleteClassroomNormal()
    {
        $acc = $this->CreateAccount();
        $this->be($acc);

        \App\Classroom::create([
            "classname" => "1",
        ]);

        tap(\App\Classroom::first(), function ($classroom) {
            $this->assertEquals("1", $classroom->classname);
        });

        $response = $this->delete('/delclassroom/1');
        
        $response->assertStatus(204);
        $response->assertSee("");

        $this->assertEquals(0, \App\Classroom::count());
        
    }
    
}
