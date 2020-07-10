<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Contiene la información para la conexión a la tabla user
class UserData extends Model
{
    protected $table = "user";
    protected $primaryKey = "id";
    
    public $timestaps = false;
    
    //variables para conexión a base de datos
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
