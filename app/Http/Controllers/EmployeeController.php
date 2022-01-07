<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
 
class EmployeeController extends Controller
{
  
    public function index()
    {
        $employees = Employee::all();
      return view ('employees.index')->with('employees', $employees);
    }
 
    
    public function create()
    {
        return view('employees.create');
    }
 
  
    public function store(Request $request)
    {
        $input = $request->all();
        Employee::create($input);
        return redirect('employee')->with('flash_message', 'Employee Addedd!');  
    }
 
    
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show')->with('employees', $employee);
    }
 
    
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employees.edit')->with('employees', $employee);
    }
 
  
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $input = $request->all();
        $employee->update($input);
        return redirect('employee')->with('flash_message', 'Employee Updated!');  
    }
 
  
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect('employee')->with('flash_message', 'Employee deleted!');  
    }
}