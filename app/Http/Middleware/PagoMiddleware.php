<?php

namespace App\Http\Middleware;
use App\PagoCongreso;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Session;
class PagoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        
        
        
        
        if (\Auth::check() && \Auth::User()->type=='asistente'){
            
            $pago = PagoCongreso::where('iduser', Auth::User()->id)->get();
            
            
            
            if(count($pago) == 0 ){
            
                $request->session()->flash('op', 'pago');
                
                $request['activarpago']= 'activarpago';

                
            }else{
    
            
                $pagado = PagoCongreso::where('iduser', Auth::User()->id)->get()[0]->verificado;
                
                if($pagado == 1){
        
                
                    $request['pagado']= 'pagado';
                
                    return $next($request);
                
                
                }
            
            }
            
            
            
            return $next($request);
            
            
        }
        

            return $next($request);
                
        
    }
}
