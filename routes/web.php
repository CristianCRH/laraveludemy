<?php


// Route::get('test',function(){

// 	$user=new App\User;
// 	$user->name='Ricardo';
// 	$user->email='ricardo@gmail.com';
// 	$user->password=bcrypt('123123');
// 	$user->save();
// 	return $user;
// });

// App\User::create([
// 'name'=>'mod',
// 'email'=>'mod@gmail.com',
// 'password'=>bcrypt('123123'),

// ]);


// App\Role::create([
// 'name'=>'estudiante',
// 'display_name'=>'Estudiante',
// 'description'=>'Este rol tiene los permisos para el estudiante'
// ]);


Route::get('quiero',function(){
	// return \App\User::all();
	return \App\User::with('messages')->get();
});


Route::get('/', ['as'=>'home','uses'=>'PagesController@home']);
Route::get('greeting3/{name?}', ['as'=>'greeting','uses'=>'PagesController@greeting'])->where('name',"[A-Za-z]+");
Route::get('ubicanos', ['as'=>'ubicanos','uses'=>'PagesController@ubicanos']);
Route::get('work',['as'=>'work','uses'=>'PagesController@work']);//Prueba

Route::resource('messages','MessagesController');

Route::resource('users','usersController');


 Route::get('login','Auth\LoginController@showLoginForm');


Route::post('/login',['as'=> 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('logout','Auth\LoginController@logout');



// Route::post('login','Auth\LoginController@login');

/*Route::get('messages',['as'=>'messages1.index','uses'=>'MessagesController@index']);
Route::get('messages/create',['as'=>'messages1.create','uses'=>'MessagesController@create']);
Route::post('messages',['as'=>'messages1.store','uses'=>'MessagesController@store']);
Route::get('messages/{id}',['as'=>'messages1.show','uses'=>'MessagesController@show']);
Route::get('messages/{id}/edit',['as'=>'messages1.edit','uses'=>'MessagesController@edit']);
Route::put('messages/{id}',['as'=>'messages1.update','uses'=>'MessagesController@update']);
Route::delete('messages/{id}',['as'=>'messages1.destroy','uses'=>'MessagesController@destroy']);
*/



Route::get('contactanos/{c?}',['as'=>'contactanos','uses'=>'PagesController@cont']);
