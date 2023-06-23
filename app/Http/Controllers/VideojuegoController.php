<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $videojuegos = Videojuego::all();
        //compact() agrega una variable con el array videojuegos
        return view('videojuegos.index', compact('videojuegos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check())
        {
            
            if (Auth::user()->role === 'admin')
            {
                return view('videojuegos.create');
            }
            else
            {
                return redirect()->route('videojuegos.index')
                ->with('failure', 'Debes iniciar sesión como administrador para poder gestionar los videojuegos.');

            }
            
            
        }
        else
        {
            return redirect()->route('videojuegos.index')
            ->with('failure', 'Inicia sesión para poder continuar.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        if (Auth::check())
        {
            if (Auth::user()->role === 'admin')
            {
                $request->validate([
                    'isan'=>'required|numeric',
                    'titulo'=>'required|string|max:125',
                    'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                    'desarrollador'=>'required|string|max:255',
                    'distribuidor'=>'required|string|max:255',
                    'genero'=>'required|string|max:125',
                    'precio'=>'required|numeric',
                    'año'=>'required|numeric'
                   
                ]);

                if($request->hasFile('imagen')):
                    $imagen=$request->file('imagen');
                    $nombreimagen=Str::slug($request->titulo).".".$imagen->extension();
                    $ruta=public_path('/img');
                    $imagen->move($ruta, $nombreimagen);
                endif;

                Videojuego::create([
                    'isan'=>$request->input('isan'),
                    'titulo'=>$request->input('titulo'),
                    'imagen' => $nombreimagen,
                    'desarrollador'=>$request->input('desarrollador'),
                    'distribuidor'=>$request->input('distribuidor'),
                    'genero'=>$request->input('genero'),
                    'precio'=>$request->input('precio'),
                    'año'=>$request->input('año'),
                ]);
            
                //save VS create: create requiere definir "fillable" dentro del modelo, solo crea, no actualiza.
                
            
                return redirect('/videojuegos')->with('success', '¡Videojuego registrado correctamente!');
            }
            else
            {
                return redirect()->route('videojuegos.index')
                ->with('failure', 'Debes iniciar sesión como administrador para poder gestionar los videojuegos.');

            }
            
            
        }
        else
        {
            return redirect()->route('videojuegos.index')
            ->with('failure', 'Inicia sesión para poder continuar.');
        }
        
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videojuego $videojuego)
    {
        
        if (Auth::check())
        {
            if (Auth::user()->role === 'admin')
            {
                return view('videojuegos.edit', ['videojuego' => $videojuego]);
            }
            else
            {
                return redirect()->route('videojuegos.index')
                ->with('failure', 'Debes iniciar sesión como administrador para poder gestionar los videojuegos.');

            }
            
            
        }
        else
        {
            return redirect()->route('videojuegos.index')
            ->with('failure', 'Inicia sesión para poder continuar.');
        }
        
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videojuego $videojuego)
    {
                
        if (Auth::check())
        {
            if (Auth::user()->role === 'admin')
            {
                $request->validate([
                    'isan'=>'required|numeric',
                    'titulo'=>'required|string|max:125',
                    'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                    'desarrollador'=>'required|string|max:255',
                    'distribuidor'=>'required|string|max:255',
                    'genero'=>'required|string|max:125',
                    'precio'=>'required|numeric',
                    'año'=>'required|numeric'
                   
                ]);

                if($request->hasFile('imagen')):
                    $imagen=$request->file('imagen');
                    $nombreimagen=Str::slug($request->titulo).".".$imagen->extension();
                    $ruta=public_path('/img');
                    $imagen->move($ruta, $nombreimagen);
                endif;
    
                $videojuego->isan = $request->input('isan');
                $videojuego->titulo = $request->input('titulo');
                $videojuego->imagen = $nombreimagen;
                $videojuego->desarrollador = $request->input('desarrollador');
                $videojuego->distribuidor = $request->input('distribuidor');
                $videojuego->genero = $request->input('genero');
                $videojuego->año = $request->input('año');
                $videojuego->precio= $request->input('precio');
                $videojuego->save();
    
                return redirect()->route('videojuegos.index')
                ->with('success', 'Videojuego actualizado correctamente.');
            }
            else
            {
                return redirect()->route('videojuegos.index')
                ->with('failure', 'Debes iniciar sesión como administrador para poder gestionar los videojuegos.');

            }
            
            
        }
        else
        {
            return redirect()->route('videojuegos.index')
            ->with('failure', 'Inicia sesión para poder continuar.');
        }
        
        
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        
        if (Auth::check())
        {
            if (Auth::user()->role === 'admin')
            {
                $videojuego->delete();

                return redirect()->route('videojuegos.index')
                ->with('success', 'Videojuego eliminado correctamente.');
            }
            else
            {
                return redirect()->route('videojuegos.index')
                ->with('failure', 'Debes iniciar sesión como administrador para poder gestionar los videojuegos.');

            }
            
            
        }
        else
        {
            return redirect()->route('videojuegos.index')
            ->with('failure', 'Inicia sesión para poder continuar.');
        }
        
        
    }


    public function editForm()
    {
        return view('videojuegos.edit_form');
    }


    public function editById(Request $request)
    {
        
            $request->validate(['id' => 'required|integer|min:1']);

            $id = $request->input('id');
            $videojuego = Videojuego::findOrFail($id);

            return view('videojuegos.edit', ['videojuego' => $videojuego]);
    }





    public function about()
    {
        
        return view('videojuegos.about');
    }

    public function contacto()
    {
        
        return view('videojuegos.contacto');
    }

    public function admin()
    {
        
        return view('videojuegos.admin');
    }

   



}
