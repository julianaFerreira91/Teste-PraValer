<?php

namespace App\Http\Controllers;

use App\Model\Course;
use App\Model\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(10);

        return view('students.list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::where('status', 1)
                         ->get();

        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        try
        {
            $course = Course::where('status', 1)
                            ->where('id', $request->course_id)
                            ->exists();

            if(!$course){
                throw new \Exception('Curso escolhido está inativo');
            }

            $student = new Student();
            $student->name         = $request->name;
            $student->cpf          = $request->cpf;
            $student->birthdate    = $request->birthdate;
            $student->email        = $request->email;
            $student->cellphone    = $request->cellphone;
            $student->address      = $request->address;
            $student->number       = $request->number;
            $student->neighborhood = $request->neighborhood;
            $student->city         = $request->city;
            $student->state        = $request->state;
            $student->status       = $request->status;
            $student->course_id    = $request->course_id;
            $student->save();

            \Session::flash('message', 'Registro incluído com sucesso.');

            return back();
        }
        catch(\Exception $e)
        {
            \Session::flash('error', $e->getMessage());

            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $courses = Course::where('status', 1)
                         ->get();

        return view('students.edit', compact('courses', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        try
        {
            $course = Course::where('status', 1)
                            ->where('id', $request->course_id)
                            ->exists();

            if(!$course){
                throw new \Exception('Curso escolhido está inativo');
            }

            $student = Student::find($id);
            $student->name         = $request->name;
            $student->cpf          = $request->cpf;
            $student->birthdate    = $request->birthdate;
            $student->email        = $request->email;
            $student->cellphone    = $request->cellphone;
            $student->address      = $request->address;
            $student->number       = $request->number;
            $student->neighborhood = $request->neighborhood;
            $student->city         = $request->city;
            $student->state        = $request->state;
            $student->status       = $request->status;
            $student->course_id    = $request->course_id;
            $student->save();

            \Session::flash('message', 'Registro atualizado com sucesso.');

            return back();
        }
        catch(\Exception $e)
        {
            \Session::flash('error', $e->getMessage());

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $student = Student::find($id);
            $student->status = 0;
            $student->save();

            \Session::flash('message', 'Registro inavitado com sucesso.');

            return back();

        }
        catch(\Exception $e)
        {
            \Session::flash('error', $e->getMessage());

            return back();
        }
    }
}
