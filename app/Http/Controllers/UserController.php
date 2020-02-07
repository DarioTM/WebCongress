<?php

namespace App\Http\Controllers;

use App\User;
use App\AsistenciaPonencia;
use App\PagoCongreso;
use App\Ponencia;
use Illuminate\Http\Request;

use DB;

use App\Http\Requests\UserCongresoRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('congreso.ponente.createPonente');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('congreso.optionPanel.createComite');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCongresoRequest $userCongresoRequest)
    {

        $input = $userCongresoRequest -> validated();//array asociativo con los valores validados y limpios
        $user = new User($input);

        try{

        $password = $user->password;
        $password = substr(str_shuffle($password), 0, 10);
        
        $user->password = bcrypt($password);
        
        $user -> save();
        $user->sendEmailVerificationNotification();
            
        $url = "http://informatica.ieszaidinvergeles.org:9039/webCongreso/public/password/reset";
        
        $destinatario = $user->email;

        $user = $user->name;
            
        $destino = $destinatario;
        $correo = new \App\Mail\CorreoInformativo($user,$url,$destinatario,$password);

        \Mail::to($destino)->send($correo);
        

        }catch(\Exception $e) {
        
        
        return redirect(url('/panelCreateComite'));
        
        }


        
        $userCongresoRequest->session()->flash('op', 'user');
        return redirect(url('/adminPanel'));

     }

    public function show($id, User $user)
    {
    
        if(\Auth::check() && \Auth::User()->id == $id){
        
        $ponencias = Ponencia::where('iduser', '=', $id)->get();
        
        $user = $user->where('id', '=', $id)->get()[0];
        
        $asistencia = AsistenciaPonencia::where('iduser', $id)->get();
        
        $asistencia =  count($asistencia);
        
        $datos = [
        'ponencias' => $ponencias,
        'user'=>$user,
        'asistencia'    =>  $asistencia,
        
        ];
        
        return view('congreso.user.profile')->with($datos);
        
        }else{
            
             return redirect(url('/'));
            
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserController  $UserController
     * @return \Illuminate\Http\Response
     */
    public function edit(UserController $UserController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserController  $UserController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserController $UserController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserController  $UserController
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        
        
        if(isset((PagoCongreso::where('iduser', $id)->get())[0]->id)){
     
            if(isset((AsistenciaPonencia::where('iduser', $id)->get())[0]->id)){
                
                DB::table('asistencia_ponencia')->where('iduser', $id)->delete();
            }
            
            
            DB::table('pago_congresos')->where('iduser', $id)->delete();
            
        }
        
        
        DB::table('users')->where('id', $id)->delete();
        
        $request->session()->flash('op', 'usarioeliminado');
        return redirect(url('/deleteUser'));
     
     
        
    }
    
    public function allUser(UserController $UserController){
        
        $users = User::all();
        return view('congreso.optionPanel.delete')->with('users',$users);
    }
    

    
    
    public function storePonente(UserCongresoRequest $userCongresoRequest)
    {

        $input = $userCongresoRequest -> validated();//array asociativo con los valores validados y limpios
        $user = new User($input);
    
        try{
    
        $password = $user->password;
        $password = substr(str_shuffle($password), 0, 10);
        
        $user->password = bcrypt($password);//importay  
        
        $url = "http://informatica.ieszaidinvergeles.org:9039/webCongreso/public/password/reset";
        
        $destinatario = $user->email;
        $user -> save();
    
        $usern = $user->name;
            
        $destino = $destinatario;
        $correo = new \App\Mail\CorreoInformativo($usern,$url,$destinatario,$password);
    
        \Mail::to($destino)->send($correo);
    
        }catch(\Exception $e) {
        
        
        return redirect(url('/createPonente'));
        
        }
    
    
        $user->sendEmailVerificationNotification();
        $userCongresoRequest->session()->flash('op', 'user');
        return redirect(url('/'));

    }
    
    
    
    public function subirProfile(Request $request){
        
        
        if($request->hasFile('file') && $request->file('file')->isValid()) {
        $file = $request->file('file');
        
        $target = '../../upload/user/';
        

        $iduser = $request->id;
        
        // $name = $file->getClientOriginalName();
        $name = $iduser . '.png'; 
        $file->move($target, $name);
        

       return redirect(url('profile', $iduser));

        
        }
    
    }
    
    
    
    
    
    public function imageid($iduser) {
        $target = '../../upload/user/';
        $search = $target . $iduser . '.*';
        $files = glob($search);
        if (count($files) === 0) {
            $files[] = '0.png';
        }
        return $this->imagefile(basename($files[0]));
    }
    
    public function imagefile($imagefile) {
        $target = '../../upload/user/';
        $mostrar = $target . '.png';
        if (file_exists($target . $imagefile)) {
            $mostrar = $target . $imagefile;
        }        
        return response()->file($mostrar);
    }
    
    
    
    
    
    
    
    
    
    
    
    
}
