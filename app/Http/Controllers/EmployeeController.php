<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }
    public function create(){
        return view('employees.create');
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'mobileCountryCode' => 'required|string',
            'mobile_number' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|in:male,female',
            'hobby' => 'nullable|array',
            'photo' => 'nullable|image|max:2048', //2MB max size
        ]);

        $employee = new Employee();
        $employee->fill($request->except('photo'));

        // accept hobby as array and convert into string before saving in database
        $employee->hobby = implode(',', $request->input('hobby', []));

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profiles'), $imageName);
            $employee->photo = $imageName;
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee Added Successfully');
    }

    public function edit(Employee $employee){
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'mobileCountryCode' => 'required|string',
            'mobile_number' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|in:male,female',
            'hobby' => 'nullable|array',
            'photo' => 'nullable|image|max:2048', //2MB max size
        ]);

        $employee->update($request->except('photo'));
        $employee->hobby = implode(',', $request->input('hobby', []));

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profiles'), $imageName);
            $employee->photo = $imageName;
        }

        $employee->save();

        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee){
        $employee->delete();
        return redirect()->route('employees.index');
    }

}
