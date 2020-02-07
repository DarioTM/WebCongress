<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PagoCongreso;
use App\Ponencia;
use App\Congreso;


class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

            $congreso = (Congreso::where('id', 1)->get())[0];
            

            return view('congreso.index')->with('congreso',$congreso);
        


    }
    
    
    public function adminPanel(PagoCongreso $pagocongreso, Ponencia $ponencia){
        
        $pagos = $pagocongreso->all();
        
        $ponencia = $ponencia->all();
        
        return view('congreso.optionPanel.indexpanel')->with(['pagos' => $pagos, 'ponencias' => $ponencia]);
    }
    
    



    
    
}
