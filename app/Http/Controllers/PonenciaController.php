<?php

namespace App\Http\Controllers;

use App\Ponencia;
use App\User;
use App\AsistenciaPonencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\PonenciaRequest;

class PonenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type', '=', 'ponente')->get();
        
        $asistencia = new AsistenciaPonencia();
        
        $ponencias = Ponencia::paginate(3);
        
        return view('congreso.ponencia.ponencias')->with(['users'=>$users, 'ponencias'=>$ponencias, 'asistencia' => $asistencia]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('type', '=', 'ponente')->get();

        return view('congreso.optionPanel.createPonencia')->with(['users'=>$users]);
    }
    
    public function createPo()
    {
        return view('congreso.ponente.createPonencia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PonenciaRequest $ponenciaRequest)
    {
        $input = $ponenciaRequest -> validated();//array asociativo con los valores validados y limpios
        $ponencia = new Ponencia($input);

        try{
            
            $result = $ponencia -> save();
        

        }catch(\Exception $e) {
        

            return redirect(url('/panelCreatePonencia'))->with($ponenciaRequest);
        
        }
        
        $ponenciaRequest->session()->flash('op', 'ponencia');
        return redirect(url('/adminPanel'));

    }
    
    public function storePo(PonenciaRequest $ponenciaRequest)
    {
        $input = $ponenciaRequest -> validated();//array asociativo con los valores validados y limpios
        $ponencia = new Ponencia($input);

        try{
            
            $result = $ponencia -> save();
        
        }catch(\Exception $e) {
        
            return redirect(url('/createPonencia'))->with($ponenciaRequest);
        }
        
        $ponenciaRequest->session()->flash('op', 'ponencia');
        return redirect(url('/'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PagoCongreso  $pagoCongreso
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        
        $ponencia = (Ponencia::where('id',$id)->get())[0];
        
        $user = (User::where('id',$ponencia->iduser)->get())[0];
 
        $url = $this->id_youtube($ponencia->video);

        
        $asistencia = AsistenciaPonencia::where('idponencia', $id)->get();
        
        
        if(isset($asistencia[0])){
            
            
            $request->session()->flash('op', 'ponenciaterminada');
            return redirect()->action('PonenciaController@index');
        } 
        
        return view('congreso.ponencia.showPonencia')->with(['user' => $user , 'ponencia' => $ponencia, 'url' => $url]);
    }



    public function id_youtube($url) 
    {
        
        $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
        $array = preg_match($patron, $url, $parte);
        if (false !== $array) {
            return $parte[1];
        }
        return false;
    }
    
    
    
    
    public function certificado($id, Request $request)
    {

        //PONENCIA GUARDAR
        $asistencia = new AsistenciaPonencia(['iduser' => \Auth::user()->id , 'idponencia' => $id]);
        $asistencia -> save();
        
        
        
        //PONENCIA ENVIAR
        
        $fecha = (DB::table('asistencia_ponencia')->where('idponencia', $id)->get())[0]->created_at;
        
        $date = new \DateTime($fecha);
        
        $fecha = $date->format('d M Y');

        
        $ponencia = (Ponencia::where('id', $id)->get())[0]->titulo;
        $name = \Auth::user()->name;
        
        
        $destinatario = \Auth::user()->email;
        $destino = $destinatario;
        $correo = new \App\Mail\Certificado($name,$ponencia,$fecha);
    
        \Mail::to($destino)->send($correo);
        
        $request->session()->flash('op', 'certificado');
        return redirect(url('/ponencias'));
        
        
    }
    
    
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PagoCongreso  $pagoCongreso
     * @return \Illuminate\Http\Response
     */
    public function edit(Ponencia $ponencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PagoCongreso  $pagoCongreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ponencia $ponencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PagoCongreso  $pagoCongreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ponencia $ponencia)
    {
        //
    }
}
