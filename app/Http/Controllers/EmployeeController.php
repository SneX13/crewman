<?php

namespace App\Http\Controllers;

use App\Employment;
use Illuminate\Http\Request;
use App\Employee;
use App\Http\Resources\Employee as EmployeeResource;

use App\Http\Resources\EmployeesCollection;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('employment', 'assignments')->paginate(5);

        return new EmployeesCollection($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return EmployeeResource
     */
    public function show(Employee $employee)
    {
        EmployeeResource::withoutWrapping();

        return new EmployeeResource($employee);

    }

    /**
     * Display only the current employment and its assignments in descending order based on the start date of the roles.
     *
     * @param $employee_id
     * @return mixed
     */
    public function showSortedCurrentEmployment($employee_id)
    {
        $currentEmployment = Employment::with([
            'assignments.roles' => function ($query) {
                $query->orderBy('roles.start_date', 'desc');
            }])->where([
            ['employee_id', $employee_id],
            ['status', 'CURRENT'],
        ])->get();

        return $currentEmployment->map(function ($item) {
            return collect($item)->merge([
                'assignments' => $item['assignments']->sortByDesc(function ($assignment) {
                    return collect($assignment['roles'])->max('start_date');
                })->values()->all()
            ]);
        });
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
