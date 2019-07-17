<?php

namespace App\Http\Controllers;
use App\Message;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
class MessagesController extends Controller
{





    function __construct()
    {

        $this->middleware('auth',['except'=>['create','store']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // query builder $messages=DB::table('messages')->get();
       $messages=Message::all();//eloquent

        return view('mymessages.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mymessages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       {
           // return $request->all();
        // return $request->input('name1');

        //save sms
           /*** DB::table('messages')->insert([
                "name"=>$request->input('name1'),
                "email"=>$request->input('email'),
                "message"=>$request->input('message'),
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now(),
            ]);
            qb
            ***/

                //eq
          /*  $message=new Message;
            $message->name=$request->input('name1');
            $message->email=$request->input('email'); 
            $message->message=$request->input('message'); 
            $message->save();
            */
            
           //Model::unguard(); //autorizar para la toma masiva
         // dd($request->all());
    }

        $message=  Message::create($request->all());
      
        if(auth()->check())
        {
          
            auth()->user()->messages()->save($message);
        }
           //redirecciona a index,...
            return redirect()->route('messages.create')->with('info','HEMOS RECIBIDO TU MESAGE');
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     //$message= DB::table('messages')->where('id',$id)->first(); qb
         $message=Message::findOrFail($id);//eq
        return view('mymessages.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $message= DB::table('messages')->where('id',$id)->first();
         $message=Message::findOrFail($id);
        return view('mymessages.edit',compact('message'));
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
        /*Actualizamos qb
        DB::table('messages')->where('id',$id)->update([
                "name1"=>$request->input('name1'),
                "email"=>$request->input('email'),
                "message"=>$request->input('message'),
                "updated_at"=>Carbon::now(),
        ]);
        */// Redirecionamos
        
//eq
        //$message=Message::findOrFail($id);
        //$message->update($request->all());
         $message=Message::findOrFail($id)->update($request->all());
        return redirect()->route('messages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //qb DB::table('messages')->where('id',$id)->delete();
         $message=Message::findOrFail($id)->delete();
       return redirect()->route('messages.index');
    }
}
