<?php

use App\Models\cita;
use App\Models\credentials;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\alert;


Route::get('/', function () {
    return view('homepage');
});

Route::get('/register', function(){
    return view('/Auth/Register');
    
    
    
});

Route::get('/pedir_cita', function(){
    return view('/Citas/pedir_cita')
    ->with('citas', cita::all());
    ;
});



Route::post('/register', function(Request $request){
    $user = Auth::user();

    $password = Hash::make($request->input('password'));
    $sip = $request->input('SIP');

    DB::table('users')
        ->where('SIP', $sip)
        ->update(['password' => $password]);

    return redirect('/')->with('success', 'Password updated successfully.');
});


Route::get('/firstlogin', function(){
    return view('/Auth/FL');
});



Route::post('/firstlogin', function(Request $request){
    $credentials = $request->validate(['SIP' => 'required']);
    $user = User::where('SIP', $credentials)->first();
    if ($user) {
        Auth::login($user);
        $request->session()->regenerate();
        return redirect('/register')->with('SIP', $user->SIP);
    }

    return back()->withErrors([
        'SIP' => 'The provided SIP does not match our records.',
    ]);
});

Route::get('/login', function(){
    return view('/Auth/Login');
});
Route::post('/login', function(Request $request){
    
    $credentials = $request->validate([
        'SIP' => ['required'],
        'password' => ['required'],
    ]);

    
    if (Auth::attempt(['SIP' => $credentials['SIP'], 'password' => $credentials['password']])) {
        $request->session()->regenerate();
        return redirect('/');
    }

    return redirect('/login');
   
});


Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});


Route::middleware('auth')->group(function(){


    Route::get('/pedir_cita', function(){
        return view('/Citas/pedir_cita')
        ->with('citas', cita::all());
    });

    Route::get('/ver_citas', function(){
        return view('/Citas/ver_citas')
        ->with('citas', cita::all());
    });



});