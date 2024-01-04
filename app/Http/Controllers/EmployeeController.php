<?php

// In the EmployeeController.php file
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        
        $userRole = Auth::user()->role;

        if ($userRole === 'Manager') {
            $employees = Employee::all();
        } elseif ($userRole === 'Web Developer') {
            $employees = Employee::where('position', 'Web Developer')->get();
        } elseif ($userRole === 'Web Designer') {
            $employees = Employee::where('position', 'Web Designer')->get();
        } else {
            // Handle other roles or unauthorized access
            abort(403, 'Unauthorized');
        }


        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        Employee::create($request->all());
        $username = strtolower($request->first_name) . " " . strtolower($request->last_name);
        User::create([
            'username' => str_replace(' ', '_', $username),
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'name' => $request->first_name . " " . $request->last_name,
            'role' => $request->position,
        ]);

        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        // Retrieve the employee and pass it to the view
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            // Add validation rules for other fields
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    public function destroy($id)
    {
        // Find the employee
        $employee = Employee::findOrFail($id);

        // Delete the employee
        $employee->delete();

        // Redirect to the index page with a success message
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }


}
