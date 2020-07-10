<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Contiene la informaci�n para la conexi�n a la tabla user
class UserData extends Model
{
    protected $table = "user";
    protected $primaryKey = "id";
    
    public $timestaps = false;
    
    //variables para conexi�n a base de datos
    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'rutaArchivo',
        'datosObjeto',
        'datosHechos',
        'correoUsuario'
        
        
    ];
    
    protected $guarded =[
        
    ];
    
}
