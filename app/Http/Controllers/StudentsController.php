<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    public function index()
    {
        return view('students.index', ['students' => Student::all()]);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        /** Validate input data and return any errors */
        $validator = $this->validateData($request);

        if ($validator->fails()) {
            return redirect('/students')->withErrors(['errors' => $validator->errors()->first()]);
        }

        /** Check if the studentcode is unique */
        $student = Student::where('studentcode', $request->input('studentcode'))->first();

        if (!empty($student->id)) {
            return redirect('/students')->withErrors(['errors' => 'Student Code already exists.']);
        }

        Student::create($this->validateRequest());

        return redirect('/students/list')->with('message', 'Student created successfully.');
    }

    public function update(Student $student)
    {
        $student->update($this->validateRequest());
    }

    public function destroy(Student $student)
    {
        $student->delete();
    }

    protected function validateData(Request $request)
    {
        return Validator::make($request->all(), $this->validationRules());
    }

    protected function validateRequest()
    {
        return request()->validate($this->validationRules());
    }

    protected function validationRules()
    {
        return [
            'firstname' => 'required', 'lastname' => 'required', 'gender' => 'required', 'classname' => 'required',
            'studentcode' => 'required', 'dob' => 'required|regex:/\d{1,2}\-\d{1,2}-\d{4}/i'
        ];
    }
}
