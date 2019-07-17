<?php

namespace App\Http\Controllers;
 use App\User;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateUserRequest;//i


class usersController extends Controller
{

    function __construct(){
        $this->middleware('auth',['except'=>['show']]);
         $this->middleware(['roles:admin,estudiante,otroRol'],['except'=>['edit','update','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=\App\User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $user=User::findOrFail($id);

       return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $users=User::findOrFail($id);
            $this->authorize('myEdit',$users);
       return view('users.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {


        $users=User::findOrFail($id);
         $this->authorize('myUpdate',$users);
        $users->update($request->all());
       
       return back()->with('info',' Usuario Acutalizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user=User::findOrFail($id);
        $this->authorize('myDelete',$user);

       $user->delete();

       return back();
    }


}
