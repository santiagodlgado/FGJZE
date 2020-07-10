<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use app;
use app\Http\Requests;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\DB;
use App\UserData;

class UserDataController extends Controller
{
    //
    public function __construct(){
        
    }
    
    public function index(Request $request) {
        if($request){
            $query = trim($request -> get('searchText'));
            $userDatas = DB::table('user')->orderBy('id','desc')
            ->paginate(7);;
            
            return view('fgjez.userData.index',["userDatas" =>$userDatas,"searchText"=>$query]);
        }
    }
    
    public function create(){
        return view("fgjez.userData.create");
    }
    
    //Método encargado de enviar los correos electronicos
    public function sendMail(){
        print_r("si entra");
        print_r($_GET['observaciones']);
        Mail::to('arcantosv@gmail.com'->user())->send('enviado');
        
    }
    
    public function store (UserFormRequest $request){
        $user = new UserData;
        $ruta = "C:/xampp/tmp/";
        $user -> nombre = $request->get("nombre");
        $user -> apellidoPaterno = $request->get("apellidoPaterno");
        $user -> apellidoMaterno = $request->get("apellidoMaterno");        
        $user -> datosObjeto = $request->get("datosObjeto");
        $user -> datosHechos = $request->get("datosHechos");
        $user -> correoUsuario = $request->get("correoUsuario");
        
        $user -> rutaArchivo = $ruta.$request->get('rutaArchivo');
        //$user ->$request->file('rutaArchivo')->store('public');
        
        if(!empty($_FILES['rutaArchivo']))
        {
            $path = "C:/xampp/tmp/";
           // $path = $path . basename( $_FILES['rutaArchivo']['name']);
            $path = $path . basename( $_FILES['name']);
            
            if(move_uploaded_file($_FILES['tmp_name'], $path)) {
                echo "The file ".  basename( $_FILES['rutaArchivo']['name']).
                " has been uploaded";
            } else{
                echo "Ah ocurrido un error!";
            }
        }
        
        //$ruta_provisional = $file["tmp_name"][$x];
        //$src = $cdir.$nombre;
        //move_uploaded_file($ruta_provisional, $src);
       // echo "<p style='color: blue'> La imagen $nombre ha sido subida con éxito</p>";
        
        $user->save();
        
        return Redirect::to('fgjez/userData');
        
    }
    
    public function show($id) {
        return view("fgjez.userData.show",["userData" => UserData::findOrFail($id)]);
    }
    
    public function edit($id) {
        return view("fgjez.userData.edit",["userData" => UserData::findOrFail($id)]);
        
    }
    
    public function update(UserFormRequest $request, $id) {
        $user = UserData::findOrFail($id);
        $user -> nombre = $request -> get('nombre');
        $user -> apellidoPaterno = $request -> get('apellidoPaterno');
        $user -> apellidoMaterno = $request -> get('apellidoMaterno');
        $user -> direccion = $request -> get('direccion');
        $user -> codigoPostal = $request -> get('codigoPostal');
        return Redirect::to('fgjez/userData');
    }
    
    public function destroy ($id) {
        $user=UserData::findOrFile($id);
        $user->update();
        return Redirect::to('fgjez/userData');
                
    }
    
    
}
