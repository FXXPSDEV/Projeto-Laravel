<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseTest extends TestCase
{
    public function test_create_courses(){
        \App\Courses::create([
            'name'=> 'Teste',
            'ement'=> 'Teste',
            'max_students'=> 30,
        ]);

        $this->assertTrue(true, 'This should already work.');
    }
}
