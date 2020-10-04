<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Model\Permiso;
use App\Model\RolxPermiso;

use Closure;
class Candado2
{
    public function handle($request, Closure $next,$permiso)
    {
    	
        //1.-Obtener el idrol del usuario que visita la pagina
    	$idrol=Auth::user()->idrol;
    	$permiso=Permiso::where('cvepermiso',$permiso)->first();
    	$rolxpermiso=RolxPermiso::where('idrol',$idrol)->where('idpermiso',$permiso->idpermiso)->first();

    	if($rolxpermiso){
    	return $next($request);	
    	}
    	else{
    		return response("No tienes permisos",401);    		
    	}        
    }
}