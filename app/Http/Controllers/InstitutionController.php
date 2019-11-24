<?php

namespace App\Http\Controllers;

use App\Model\Institution;
use Illuminate\Http\Request;
use App\Http\Requests\InstitutionRequest;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutions = Institution::paginate(10);

        return view('institutions.list', compact('institutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('institutions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstitutionRequest $request)
    {
        try
        {
            $institution = new Institution();
            $institution->name   = $request->name;
            $institution->cnpj   = $request->cnpj;
            $institution->status = $request->status;
            $institution->save();

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
        $institution = Institution::find($id);

        return view('institutions.edit', compact('institution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstitutionRequest $request, $id)
    {
        try
        {
            $institution = Institution::find($id);
            $institution->name   = $request->name;
            $institution->cnpj   = $request->cnpj;
            $institution->status = $request->status;
            $institution->save();

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
            $institution = Institution::find($id);
            $institution->delete();

            \Session::flash('message', 'Registro excluído com sucesso.');

            return back();

        }
        catch(\Exception $e)
        {
            \Session::flash('error', $e->getMessage());

            return back();
        }
    }
}
