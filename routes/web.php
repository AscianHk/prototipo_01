<?php

use App\Http\Controllers\CitaController;
use App\Http\Middleware\personal;
use App\Models\centros;
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


//=======================================================
//         REGISTRO DE USUARIO Y CREACION EN DB
//=======================================================

Route::get('/register', function(){
    return view('/Auth/Register');
    
    
    
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

//========================================================
//========================================================







//=======================================================
//    PRIMER LOGIN CON EL QUE SACAR UNA CONTRASEÑA
//=======================================================


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


//========================================================
//========================================================



//========================================================
//                  LOGIN DE USUARIO
//========================================================



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



//========================================================
//========================================================


//========================================================
//                         LOGOUT
//========================================================



Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

//========================================================
//========================================================




//================================================================================
// MIDDLEWARE PARA ASEGURAR QUE EL USUARIO ESTA LOGEADO PARA ACCEDER A ESTAS RUTAS
//================================================================================



Route::middleware('auth')->group(function(){


    //========================================================
    //             CREAR CITA Y ALMACENADO EN BD
    //========================================================

    Route::get('/pedir_cita', function(){
        return view('/Citas/pedir_cita')
        ->with('citas', cita::all())
        ->with('centros', centros::all());
    });
    Route::post('/pedir_cita', function(Request $request){
        $cita = new cita();
        $cita->user_id = Auth::user()->id;
        $cita->centros_id = $request->input('centro_id');
        $cita->dia = $request->input('Dia');
        $cita->hora = $request->input('Hora');
        $cita->save();

        return redirect('/')->with('success', 'Cita creada correctamente.');
    });
    //========================================================
    //========================================================




    //========================================================
    //                      VER CITAS
    //========================================================


    Route::get('/ver_citas', function(){
        $user_id = Auth::id();
        $citas = DB::table('citas')
            ->where('user_id', $user_id)
            ->get();
        
        return view('/Citas/citas')
            ->with('citas', $citas);
    });


    //========================================================
    //                     BORRAR CITAS
    //========================================================


    Route::delete('/citas/{id}', function($id){
        $cita = cita::find($id);
        if ($cita) {
            $cita->delete();
            return redirect('/ver_citas')->with('success', 'Cita eliminada correctamente.');
        } else {
            return redirect('/ver_citas')->with('error', 'Cita no encontrada.');
    }   
    });

    //========================================================
    //                   MODIFICAR CITAS
    //========================================================
        

    Route::get('/modificar_cita/{id}', function($id){
        $cita = cita::find($id);
        $citas = DB::table('citas')
            ->where('id', $id)
            ->get();

        return view('/Citas/modificar_cita')
            ->with('cita', $citas);
    });

    

    Route::patch('/modificar_cita/{id}', [CitaController::class, 'update'])->name('citas.update');

    //========================================================
    //========================================================



//====================================================================================
// MIDDLEWARE PARA ASEGURAR QUE EL USUARIO ES DEL PERSONAL PARA ACCEDER A ESTAS RUTAS 
//====================================================================================
    // Route::middleware('personal')->group(function(){
        Route::get('/administracion', function(){
                return view('/Admin/administracion');
        });

        Route::get('/agenda', function(){
                return view('/Admin/agenda');
        });

    // });

//====================================================================================
//====================================================================================


});



