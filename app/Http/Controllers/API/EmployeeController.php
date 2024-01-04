<?php
// app/Http/Controllers/API/EmployeeController.php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return response()->json(['data' => $employees]);
    }

    public function show(Employee $employee)
    {
        return response()->json(['data' => $employee]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'position' => 'required',
        ]);

        $employee = Employee::create($request->all());
        return response()->json(['data' => $employee], 201);
    }

    public function update(Request $request, Employee $employee): JsonResponse
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'position' => 'required',
        ]);

        $employee->update($request->all());
        return response()->json(['data' => $employee, 'message' => 'Employee updated successfully']);
    }

    public function destroy(Employee $employee): JsonResponse
    {
        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully']);
    }
}

