<?php

use App\Models\credentials;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('cesped')->with('credentials', credentials::all());
});

Route::get('/register', function(){
    return view('/Auth/Register');
    
    
    
});

Route::post('/register', function(Request $request){
    $user = new User();

    $user->SIP=$request->input('SIP');
    $user->password=Hash::make($request->input('Password'));

    $user->save();

    $credentials = new credentials();

    $credentials->name=$request->input('name');
    $credentials->surname=$request->input('surname');
    $credentials->Fecha_Nacimiento=$request->input('Fecha_Nacimiento');
    $credentials->user_SIP=$user->SIP;
    

    
    $credentials->save();



});
