<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use GuzzleHttp\Client;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('revalidate');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'curp' => 'required|min:18|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $curp = $data['curp'];

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

             $error = $posts->mensaje;

             if($error == "ERROR" ){
               echo'<script type="text/javascript">
                alert("Curp invalida, Por Favor Ingrese Datos Correctos");
                location = "register"
                </script>';
             }
             else
             {
             $nombre = $posts->response[0]->nombre;
             $apellidoMaterno = $posts->response[0]->apellidoMaterno;
             $apellidoPaterno = $posts->response[0]->apellidoPaterno;
             $name = strtoupper($data['name']);
             $apat = strtoupper($data['apat']);
             $amat = strtoupper($data['amat']);

             if($nombre == $name && $apellidoMaterno == $amat && $apellidoPaterno == $apat ){
               echo'<script type="text/javascript">
                alert("Bienvenido, usted se ha registrado satisfactoriamente.");
                location.href = "register"
                </script>';


               return User::create([
              'name' => $data['name'],
              'email' => $data['email'],
              'password' => bcrypt($data['password']),
              'curp' => $data['curp'],
        ]);
        }
        echo'<script type="text/javascript">
         alert("Tu nombre es incorrecto, por favor ingrese datos correctos.");
         location.href = "register"
         </script>';
    }
    }
}
