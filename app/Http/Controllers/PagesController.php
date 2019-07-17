<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{
   /// protected $request;
    ///public function  __construct(Request $request){
    ///  $this->request=$request;
   /// }

  public function __construct()
  {
    //$this->middleware('redirectIfAuthenticated2',
    //  ['except'=>['home','greeting']]);

   // $this->middleware('redirectIfAuthenticated2',
     // ['only'=>['home','greeting']]);

    $this->middleware('redirectIfAuthenticated2',
      ['except'=>['home','greeting','work','cont','ubicanos']]);
      //APLICAMOS A LOS METODOS QUE QUERRAMOS INTERSEPTAR XD :)
  }



public function ubicanos()
{
   return view('ubicanos');
}

  public function home()
  {
    return view('home');
   
   // return response('Contenido De La Respuesta',201)
     //       ->header('X-TOKEN','secret')
       //     ->header('X-TOKEN-2','secret-2')
         //   ->cookie('X-COOKIE','Cristian Ricardo');//son encriptadoas Automaticamente
  }

  public function greeting($name="Invited")
  {
       //formas de pasar datos por url
   //return view('greeting3',['name'=>$name]);
    //return view ('greeting3')->with(['name'=>$name]);
    $html="<h2>Contenido html</h2>";//ingresado por el formulario
    $js="<script>alert('Alerta de inyeccion');</script>";//ingresado por el formulario
    $consola=[
        "play station 4",
        "Xbos One",
        "Wii U"
    ];
     
    return view('greeting3',compact('name','html','js','consola'));
  }

 /// public function message()
 /// {
  ///    return $this->request->all();
  //}




 public function work()
{
 return view('work');
}
 public function cont($c='juan Perez')
 {
    return view('cont',compact('c'));
 }
}
