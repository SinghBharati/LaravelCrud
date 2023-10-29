<?php

namespace App\Http\Controllers;

use App\Exports\ExportEmployee;
use App\Imports\ImportEmployee;
use Illuminate\Http\Request;
use App\Models\Employee;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee_form', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|digits:10',
            'email' => 'required|email|max:255',
            'gender' => 'required|in:male,female,other',
            'is_married' => 'required|in:Yes,No',
            'profile_image' => 'required|image|mimes:jpg,jpeg,png',
            'status' => 'array|in:1',
        ]);


        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $extension = $profileImage->getClientOriginalExtension();
            $profileImageName = time(). "." . $extension;
            $profileImage->move('storage/images', $profileImageName);
        }

        $employee = Employee::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'gender' => $request->gender,
            'is_married' => $request->is_married,
            'profile_image' => $profileImageName,
            'status' => $request->has('status') ? implode(",", $request->status) : '0',
        ]);

        $employee->save();

        return redirect(route('index'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        return view('employee_edit_form' , ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->mobile = $request->mobile;
        $employee->email = $request->email;
        $employee->gender = $request->gender;
        $employee->is_married = $request->is_married;

        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $extension = $profileImage->getClientOriginalExtension();
            $profileImageName = time(). "." . $extension;
            $profileImage->move('storage/images', $profileImageName);
            $employee->profile_image = $profileImageName;
        }

        $employee->status = $request->has('status') ? implode(",", $request->status) : '0';
        $employee->save();

        return redirect(route('index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Employee::destroy($id);
        return redirect(route('index'));

    }


    //ImportExport
    public function importView(Request $request){
        return view('importFile');
    }

    // From  Excel to Database
    public function import(Request $request){
        Excel::import(new ImportEmployee, $request->file('file')->store('files'));
        return back();
    }

    // From Database to Excel
    public function exportUsers(Request $request){
        return Excel::download(new ExportEmployee, 'employees.xlsx');
    }


}
