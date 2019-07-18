<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Dependence;
use App\User;
use Session;
use App\Http\Requests;
use Validator;
use GuzzleHttp\Client;



class UserController extends Controller
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
       $highusers = User::all();
       $depence = Dependence::all();
       return view ('homet', [
       'data' => $highusers,
       'highusers' => $depence,
       'type' => "Usuario | Protesta",
       'model' => "protest",
       'id' => "idh",
       'text_section' => "Vista de usuario",
       'columns' => [
      'Nombre' => 'name',
      'E-mail' => 'email',
      'Curp' => 'curp',
      'Departamento' => 'dependence',
    ],
   ]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $curp = "EORA930630HMCSJL08";
      $client = new Client();
              $response = $client->request( 'POST', 'https://desabus.edomex.gob.mx/bussrv/sei/dkb_frRENAPO1.php/consulta',
                    [
                    'headers' => [
                    'Content-Type' => 'application/json; charset=UTF8',
                                 ],
                     'auth'    => [
                         'cmsreg',
                         '#6G%ujo#'
                                  ],
                      'body'  =>
                      '  {
                             "request": {
                                 "consulta": "CURP",
                                 "data": {
                                     "CURP": "' . $curp . '"
                                   }
                             }
                        }
                       '
                    ]
            );
             $posts = json_decode( $response->getBody()->getContents());

      $highusers = Dependence::all();
      return view('user.create', ['highusers'=>$highusers, 'posts' => $posts]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              $highuser= new User();
                $highuser->name = $request->name;
                $highuser->lastname = $request->lastname;
                $highuser->email = $request->email;
                $highuser->type = $request->type;
                $highuser->dependence = $request->dependece;
                $highuser->password = bcrypt('123456');
                $highuser->save();
              return redirect('/user/create')->with('status','Su usuario se ha creado con exito.');

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
        //
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
