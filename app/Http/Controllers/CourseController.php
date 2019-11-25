<?php

namespace App\Http\Controllers;

use App\Model\Course;
use App\Model\Institution;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(10);

        return view('courses.list', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutions = Institution::where('status', 1)
                                   ->get();

        return view('courses.create', compact('institutions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        try
        {
            $institution = Institution::where('status', 1)
                                      ->where('id', $request->institution_id)
                                      ->exists();

            if(!$institution){
                throw new \Exception('Instituição escolhida está inativa.');
            }

            $course = new Course();
            $course->name           = $request->name;
            $course->duration       = $request->duration;
            $course->status         = $request->status;
            $course->institution_id = $request->institution_id;
            $course->save();

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
        $course = Course::find($id);
        $institutions = Institution::where('status', 1)
                                   ->get();

        return view('courses.edit', compact('course', 'institutions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        try
        {
            $institution = Institution::where('status', 1)
                                 ->where('id', $request->institution_id)
                                 ->exists();

            if(!$institution){
                throw new \Exception('Instituição escolhida está inativa.');
            }

            $course = Course::find($id);
            $course->name           = $request->name;
            $course->duration       = $request->duration;
            $course->status         = $request->status;
            $course->institution_id = $request->institution_id;
            $course->save();

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
            $course = Course::find($id);
            $course->status = 0;
            $course->save();

            \Session::flash('message', 'Registro inativado com sucesso.');

            return back();

        }
        catch(\Exception $e)
        {
            \Session::flash('error', $e->getMessage());

            return back();
        }
    }
}
