<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Protest;
use App\Dependence;
use App\User;
use Session;
use App\Http\Requests;
use Validator;
use Mail;
use Carbon\Carbon;

class DependenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //ADMIN
        if(Auth::user()->type == 'admin')
        {
        $highusers = Dependence::all();
        $depence = Dependence::all();
        return view ('homet', [
        'data' => $highusers,
        'highusers' => $depence,
        'type' => "Dependencia",
        'typefunction' => "catalogo",
        'model' => "dependece",
        'id' => "idh",
        'text_section' => "Vista de usuario",
        'columns' => [
          'Organizacion/Dependencia' => 'nombre',
          'Domicilio' => 'address',


        ],
      ]);
        }
      }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('dependence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $highuser= new Dependence();
        $highuser->nombre = $request->name;
        $highuser->address = $request->address;

        $highuser->save();
        return redirect("dependece")->with('msg','Se ha creado con exito.');
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

        $var = Dependence::find($id);

        return view('dependence.edit',['var'=>$var]);
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
        $highuser = Dependence::where('id', $id);
        $highuser->update([
        'nombre' => $request->name,
        'address' => $request->address,
        ]);
        return redirect('dependece')->with('msg', 'Se actualizo con exito ');
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
