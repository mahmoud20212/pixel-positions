<?php

namespace Tests\Unit;

use App\Models\Employer;
use App\Models\Job;
use PHPUnit\Framework\TestCase;

class JobTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
    
    public function test_belongs_to_an_employer(): void
    {
        $employer = Employer::factory()->create();
        $job = Job::factory()->create([
            "employer_id"=> $employer->id,
        ]);

        $this->assertTrue($job->employer->is($employer));
    }
    
    public function test_can_have_tags(): void
    {
        $job = Job::factory()->create();
        $job->tag('Frontend');

        $this->assertCount(1, $job->tags);
    }
}
