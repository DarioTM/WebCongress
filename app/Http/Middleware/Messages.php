<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Messages
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
        $menssages = [
            'logged' => 'Bienvenido',
            'verified' => 'Usuario verificado, ya puedes iniciar sesión',
            'registered' => 'Registrado, ver correo',
            'reverification' =>'Tu direccion de email no ha sido verificada, te hemos reenviado un correo de verificacion',
            'passwordreset' => 'Clave de acceso reseteada',
            'user'    =>  'Usuario creado correctamente',
            'ponencia'    =>  'Ponencia creada correctamente',
            'pago'      =>  'No has pagado todavia',
            'pagoSubido'    =>  'Comprobante subido, a la espera de confirmacion',
            'eliminado'     =>  'Eliminado correctamente',
            'errorborrado'     =>  'Error de borrado',
            'pagoAceptado'  =>  'Pago Aceptado',
            'certificado'   =>   'Enhorabuena, has finalizado la ponencia, revisa tu bandeja de entrada',
            'ponenciaterminada' =>  'Ya has visto esa ponencia',
            'emailsend'     =>  'Se ha enviado un email a tu correo para restablecer la contraseña',
            'editperfil'    =>  'Perfil editado con exito',
            'usarioeliminado'   =>  'Usuario eliminado',
        ];
        $opSession = $request->session()->get('op');
        $alertMessage = null;
        if (isset($menssages[$opSession])) {
            $alertMessage = $menssages[$opSession];
            // $request->session()->forget('op');
        }
        
        
        $request['message'] = $alertMessage;
        return $next($request);
    }
}
