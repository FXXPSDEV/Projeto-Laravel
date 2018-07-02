<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EnrollmentTest extends TestCase
{
    public function test_create_user(){
        \App\Enrollments::create([
            'course_id'=> '1',
            'student_id'=>'1',
            'authorized'=>'Ativado',
        ]);

        $this->assertTrue(true, 'This should already work.');
    }
}
