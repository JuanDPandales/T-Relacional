<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Tienda;

use Illuminate\Http\Request;

class RelacionController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        //Inserción de imágenes en un producto

        if($productos -> hasFile('imagen')){
            if ($productos->image !=null){
                Producto::disk('images')->delete($productos->image->path);
                $productos->user->image->delete();
            }
            $productos->image()->create([
                'path' => $productos->image->store('productos', 'images'),
            ]);
        }

        //Básica función Index para mostrar los registro "productos"
        return view('welcome', compact('productos'));
}
}