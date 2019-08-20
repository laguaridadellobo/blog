<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Protest;
use App\Dependence;
use App\User;
use App\Municipality;
use Session;
use App\Http\Requests;
use Validator;
use Mail;
use Carbon\Carbon;


class ProtestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');

     }

    public function index()
    {
        //USER
        if (Auth::user()->type == 'user')
        {
        $highusers = Protest::where('user_id',Auth::user()->email)->get();
        $depence = Dependence::all();
        return view ('homet', [
        'data' => $highusers,
        'highusers' => $depence,
        'type' => "Usuario | Protesta",
        'model' => "protest",
        'typefunction' => "normal",
        'id' => "idh",
        'text_section' => "Vista de usuario",
        'columns' => [
          'Titulo' => 'title',
          'Departamento' => 'departament',
          'T. Persona' => 'typeperson',
          'Fecha' => 'created_at',
          'Folio' => 'folio',
          'Contacto' => 'user_id',
        ],
      ]);
        }
        //ADMIN
        if(Auth::user()->type == 'admin')
        {
        $highusers = Protest::all();
        $depence = Dependence::all();
        return view ('homet', [
        'data' => $highusers,
        'highusers' => $depence,
        'type' => "Protesta",
        'model' => "protest",
        'typefunction' => "normal",
        'id' => "idh",
        'text_section' => "Vista de usuario",
        'columns' => [
          'Titulo' => 'title',
          'Departamento' => 'departament',
          'T. Persona' => 'typeperson',
          'Fecha' => 'created_at',
          'Folio' => 'folio',
          'Contacto' => 'user_id',

        ],
      ]);
        }
        //ANALIST
        if(Auth::user()->type == 'analista')
        {
        $highusers = Protest::where('proceed','0')->get();
        $depence = Dependence::all();
        return view ('homet', [
        'data' => $highusers,
        'highusers' => $depence,
        'type' => "ANALISTA | Protesta",
        'model' => "protest",
        'typefunction' => "normal",
        'id' => "idh",
        'text_section' => "Vista de usuario",
        'columns' => [
          'Titulo' => 'title',
          'Departamento' => 'departament',
          'T. Persona' => 'typeperson',
          'Fecha' => 'created_at',
          'Folio' => 'folio',
          'Contacto' => 'user_id',
        ],
      ]);
        }
        //ENLACE
        if(Auth::user()->type == 'enlace')
        {
          $date = Carbon::now();
          $date = $date->format('Y-m-d');
          $highusers = DB::table('protests')->where('proceed','1')->
                                          where('departament',Auth::user()->dependence)
                                          ->where('finish_at','>=',$date)->get();

        $depence = Dependence::all();
        return view ('homet', [
        'data' => $highusers,
        'highusers' => $depence,
        'type' => "Enlace | Protesta",
        'model' => "protest",
        'typefunction' => "normal",
        'id' => "idh",
        'text_section' => "Vista de usuario",
        'columns' => [
          'Titulo' => 'title',
          'Folio' => 'folio',
          'Comentarios' => 'comments',
          'Fecha' => 'created_at',

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
      if(Auth::user()->phone == NULL)
      {
        return redirect('user/'.Auth::User()->id.'/edit')->with('status','Es necesario su numero telefonico antes de realizar una nueva protesta por favor verificalos '.Auth::User()->name);
      }
      else {


      $highusers = Dependence::all();
      $muni = Municipality::select('name')->get();

      $user = User::Where('id', Auth::User()->id )->first();
      return view('protest', ['user'=>$user,
                              'highusers'=>$highusers,
                              'muni' => $muni,
                              ]);
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'juridic' => 'required',
            'departament' => 'required',
            'documentidentification' => 'image',
            'document' => 'required|mimes:pdf',
            'documentp' => 'mimes:pdf',
          //'name'=>'required|regex:/^([A-Z]{1}[a-z\s]*)+$/',
          //'mail'=>'required|email|unique:enterprices',
          //'phone'=>'required|digits:10',
          //'rfc' => array('required',
          //'regex:/^[A-Z]{4}[0-9]{6}[A-Z,0-9]{3}$/'),
      ]);
        $document = $request->file('document')->store('public');
        $documentidentification = $request->file('documentidentification')->store('public');
        if($request->file('documentp') != NULL){
          $documentp = $request->file('documentp')->store('public');
        }
          $folio = uniqid();
          $highuser= new Protest();
          $highuser->curp = $request->curp;
          $highuser->title = $request->title;
          $highuser->nombrevs = $request->nombrevs;
          $highuser->cargo = $request->cargo;
          $highuser->typeperson = $request->juridic;
          $highuser->departament = $request->departament;
          $highuser->folio = $folio;
          $highuser->user_id = Auth::user()->id;
          $highuser->mail = Auth::user()->email;
          $highuser->document = $document;
          if($request->file('documentp') != NULL){
            $highuser->documentp = $documentp;
          }
          $highuser->documentidentification = $documentidentification;
          $date = Carbon::now();
          $enddate = $date->addDays(5);
          $date = $date->format('Y-m-d');
          $highuser->finish_at = $enddate;
          $highuser->save();


          Mail::send('contact',$request->all(), function($msj){
            $msj->subject('Nueva Protesta Enviada con exito');
            $msj->to(Auth::user()->email);
            });



          Mail::send('auditor',$request->all(), function($msj){
            $user=User::where('type','analista')->first();
            $msj->subject('Usted tiene una nueva Protesta que atender');
            $msj->to($user->email);
            });

          return redirect('/protest/create')->with('status','Se le ha enviado una notificación por correo, Su protesta se ha credo con exito. su folio unico es: '.$folio);

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


    public function turnado()
    {
        //
        //ANALIST
        if(Auth::user()->type == 'analista' || Auth::user()->type == 'admin')
        {
        $highusers = Protest::where('proceed','1')->get();
        $depence = Dependence::all();
        return view ('homet', [
        'data' => $highusers,
        'highusers' => $depence,
        'type' => "ANALISTA | Protestas Atendida",
        'model' => "protest",
        'typefunction' => "normal",
        'id' => "idh",
        'text_section' => "Vista de usuario",
        'columns' => [
          'Titulo' => 'title',
          'Departamento' => 'departament',
          'T. Persona' => 'typeperson',
          'Fecha' => 'created_at',
          'Folio' => 'folio',
          'Contacto' => 'user_id',
        ],
      ]);
        }
        if(Auth::user()->type == 'enlace')
        {
        $highusers = Protest::where('proceed','4')->get();
        $depence = Dependence::all();
        return view ('homet', [
        'data' => $highusers,
        'highusers' => $depence,
        'type' => "Enlace | Protestas Atendida",
        'model' => "protest",
        'typefunction' => "normal",
        'id' => "idh",
        'text_section' => "Vista de usuario",
        'columns' => [
          'Titulo' => 'title',
          'Folio' => 'folio',
          'Departamento' => 'departament',
          'Fecha' => 'created_at',


        ],
      ]);
        }
    }

    public function noturnado()
    {
      //
      //ANALIST
      if(Auth::user()->type == 'analista' || Auth::user()->type == 'admin')
      {
      $highusers = Protest::where('proceed','3')->get();
      $depence = Dependence::all();
      return view ('homet', [
      'data' => $highusers,
      'highusers' => $depence,
      'type' => "ANALISTA | Protestas No Atendida",
      'model' => "protest",
      'typefunction' => "normal",
      'id' => "idh",
      'text_section' => "Vista de usuario",
      'columns' => [
        'Titulo' => 'title',
        'Departamento' => 'departament',
        'T. Persona' => 'typeperson',
        'Fecha' => 'created_at',
        'Folio' => 'folio',
        'Contacto' => 'user_id',
      ],
    ]);
      }

      if(Auth::user()->type == 'enlace' )
      {
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        $highusers = DB::table('protests')->where('proceed','1')
                                        ->where('departament',Auth::user()->dependence)
                                        ->where('finish_at','<',$date)->get();

        $depence = Dependence::all();
        return view ('homet', [
        'data' => $highusers,
        'highusers' => $depence,
        'type' => "ANALISTA | Protestas No Atendida",
        'model' => "protest",
        'typefunction' => "normal",
        'id' => "idh",
        'text_section' => "Vista de usuario",
        'columns' => [
          'Titulo' => 'title',
          'Departamento' => 'departament',
          'T. Persona' => 'typeperson',
          'Fecha' => 'created_at',
          'Folio' => 'folio',
          'Contacto' => 'user_id',
        ],
      ]);
      }

    }

    public function vence(){
      if(Auth::user()->type == 'enlace')
      {
      $date = Carbon::now();
      $date = $date->format('Y-m-d');

      $highusers = DB::table('protests')->where('proceed','1')
                                        ->where('departament',Auth::user()->dependence)
                                        ->where('finish_at','=',$date)
                                        ->get();
      $depence = Dependence::all();
      return view ('homet', [
      'data' => $highusers,
      'highusers' => $depence,
      'type' => "ENLACE | Protestas proxima",
      'model' => "protest",
      'typefunction' => "normal",
      'id' => "idh",
      'text_section' => "Vista de usuario",
      'columns' => [
        'Titulo' => 'title',
        'Folio' => 'folio',
        'Departamento' => 'departament',
        'Fecha' => 'created_at',


      ],
    ]);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      if(Auth::user()->type == 'analista')
      {
        $user = Protest::where('id', $id);
        $user->update([
          'departament' => $request->departament,
          'comments' => $request->comments,
          'proceed' => $request->proceed,
              ]);
        return redirect('/protest')->with('msg', 'Se envio con exito sus comentarios ');
      }
      if(Auth::user()->type == 'enlace')
      {
        $user = Protest::where('id', $id);
        $user->update([
          'comments2' => $request->comments2,
            'proceed' => $request->proceed,
              ]);
        return redirect('/protest')->with('msg', 'Se envio con exito sus comentarios ');
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
        //
    }

    public function subcat(Request $request)
    {
      $cp_id = Input::get('cp_id');
      $muni = Municipality::where('name', '=',$cp_id)->first();
      $pro = Dependence::where('municipality_id','=',$muni->id)->get();
      return response()->json($pro);

    }
}
