<?php

namespace Tests\Unit;

use App\Assignment;
use App\Employment;
use App\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use Tests\TestCase;

class CurrentEmploymentTest extends TestCase
{
    use DatabaseMigrations;

    use DatabaseTransactions;

    /**
     * Assert that you can list current employment and
     * its assignments in descending order based on the start date of the roles.
     */
    public function testYouCanFetchCurrentEmploymentAndSortAssignments()
    {
        $employment = factory(Employment::class)->create();
        $assignment = factory(Assignment::class)->create(['employment_id' => $employment->id]);
        $assignment->roles()->save(factory(Role::class)->create(['start_date' => now()]));
        $pastAssignment = factory(Assignment::class)->create(['employment_id' => $employment->id]);
        $pastAssignment->roles()->save(factory(Role::class)->create(['start_date' => now()->subDays(1)]));
        $futureAssignment = factory(Assignment::class)->create(['employment_id' => $employment->id]);
        $futureAssignment->roles()->save(factory(Role::class)->create(['start_date' => now()->addDays(1)]));
        $employmentArray = $employment->toArray();

        $assignments = ['assignments' => [
            array_merge($futureAssignment->toArray(), [
                'roles' => $futureAssignment->roles->toArray(),
            ]),
            array_merge($assignment->toArray(), [
                'roles' => $assignment->roles->toArray(),
            ]),
            array_merge($pastAssignment->toArray(), [
                'roles' => $pastAssignment->roles->toArray(),
            ]),
        ]];

        $sorted = array_merge($employmentArray, $assignments);

        $response = $this->json('GET', "api/employees/{$employment->employee_id}/current_employment");

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([$sorted]);
    }
}
