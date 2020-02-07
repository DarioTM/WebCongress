<?php

namespace App\Http\Controllers;

use App\PagoCongreso;
use Illuminate\Http\Request;
use App\Http\Requests\PagoRequest;
use DB;


class PagoCongresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('congreso.asistente.pago');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PagoRequest $request)
    {
        
        $input = $request -> validated();
        $pago = new PagoCongreso($input);

        try{
            $result = $pago -> save();
                    
        if($request->hasFile('documento') && $request->file('documento')->isValid()) {
        $file = $request->file('documento');
        
        $target = '../../upload/pagos/';
        

        $iduser = $pago->iduser;
        
        // $name = $file->getClientOriginalName();
        $name = $iduser . '.' . $file->getClientOriginalExtension(); 
        $file->move($target, $name);

        }

        
            
         }catch(\Exception $e) {
             
             return redirect(url('/pago'))->with($request);
            
              
         }
         
            $request->session()->flash('op', 'pagoSubido');
            return redirect(url('/'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PagoCongreso  $pagoCongreso
     * @return \Illuminate\Http\Response
     */
    public function show(PagoCongreso $pagoCongreso)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PagoCongreso  $pagoCongreso
     * @return \Illuminate\Http\Response
     */
    public function edit(PagoCongreso $pagoCongreso)
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
    public function update(Request $request)
    {
        try{
            PagoCongreso::whereId($request->id)->update(['verificado' => '1']);
            
        }catch(\Exception $e){
            
            $request->session()->flash('op', 'errorborrado');
            return redirect(url('/aceptar'));
        }
        
        $request->session()->flash('op', 'pagoAceptado');
        
        return redirect(url('/aceptar'));
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PagoCongreso  $pagoCongreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        
        DB::table('pago_congresos')->where('id', $id)->delete();
        
        return redirect(url('/aceptar'));
    }
    
    
    public function showPanel(PagoCongreso $pagoCongreso)
    {
        
        $pagos = $pagoCongreso->all();
        return view('congreso.optionPanel.aceptar')->with(['pagos' => $pagos]);

    }
    
    
    public function imageid($iduser) {
        $target = '../../upload/pagos/';
        $search = $target . $iduser . '.*';
        $files = glob($search);
        if (count($files) === 0) {
            dd($files);
        }
        return $this->imagefile(basename($files[0]));
    }
    
    public function imagefile($imagefile) {
        $target = '../../upload/pagos/';
        $mostrar = $target . '0.png';
        if (file_exists($target . $imagefile)) {
            $mostrar = $target . $imagefile;
        }        
        return response()->file($mostrar);
    }
    
    
    
    

    
    
}
