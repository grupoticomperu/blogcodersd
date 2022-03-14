<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Zona;
use Carbon\Carbon;
use App\Http\Requests\StoreClienteRequest;

class ClienteController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:admin.clientes.index')->only('index');
        $this->middleware('can:admin.clientes.create')->only('create','store');
        $this->middleware('can:admin.clientes.show')->only('show');
        $this->middleware('can:admin.clientes.edit')->only('edit','update');
        $this->middleware('can:admin.clientes.destroy')->only('destroy');
        
    }





    public function index()
    {

        //if(auth()->user()->id == 1 or auth()->user()->id == 2) {
     /*   if(auth()->user()->id == 1) {    
            $clientes = Cliente::all();
        }else{
            $clientes = Cliente::where('user_id', auth()->user()->id)->get();
        }*/

        if( auth()->user()->hasRole('Admin') )
        {
            $clientes = Cliente::all();
            
        }
        else
        {
            $clientes = auth()->user()->clientes;
         }

   
        return view('admin.clientes.index', compact('clientes'));
    }

  
    public function create()
    {
        //$categories = Category::all();
         $users = User::pluck('name', 'id');
         $zonas = Zona::pluck('name', 'id');
 
         return view('admin.clientes.create', compact('users', 'zonas'));
    }

   
    public function store(Request $request)
    {
     
        
        $this->validate($request, [
            'nombres' => 'required'
        ]);

        $cliente = Cliente::create([
            //$request->only('title')
            'nombres' => $request->get('nombres')
            //'user_id' => auth()->id()
        ]);

        return redirect()->route('admin.clientes.edit', compact('cliente'));




       
    /*   
        $this->validate($request, [
            'nombres' => 'required'
        ]);

        $cliente = Cliente::create([
            //$request->only('title')
            'dni' => $request->get('dni'),
            'nombres' => $request->get('nombres'),
            'apellidos' => $request->get('apellidos'),
            'user_id' => $request->get('user_id'),
            'zona_id' => $request->get('zona_id'),
        ]);

        return redirect()->route('admin.clientes.index', $cliente);
    */

    }

  
    public function show(Cliente $cliente)
    {
        $this->authorize('misclientes', $cliente);
        return view('admin.clientes.show', compact('cliente'));
    }

  
    public function edit(Cliente $cliente)
    {

        $this->authorize('misclientes', $cliente);
        //$this->authorize('update', $post);
       // $this->authorize('view', $post);

       $users = User::all();
       $zonas = Zona::all();
       return view('admin.clientes.edit',compact('cliente','users','zonas'));



       // $this->authorize('author', $post);

      //  $categories = Category::pluck('name', 'id');
      //  $tags = Tag::all();

       // return view('admin.clientes.edit', compact('cliente'));
    }


    public function update(Cliente $cliente, StoreClienteRequest $request)
    {
        $this->authorize('misclientes', $cliente);
       //$cliente = Cliente::findorFail($cliente->id);

       $cliente->nombres = $request->get('nombres');
       $cliente->dni = $request->get('dni');

       $cliente->user_id = $request->get('user_id');
       $cliente->zona_id = $request->get('zona_id');
       $cliente->tipodocumento = $request->get('tipodocumento');

       $cliente->fechadeventa =  $request->has('fechadeventa')?Carbon::parse($request->get('fechadeventa')):null;
       $cliente->fechaderecepcion =  $request->has('fechaderecepcion')?Carbon::parse($request->get('fechaderecepcion')):null;
       $cliente->estadocivil = $request->get('estadocivil');
       $cliente->pagoadministrativo = $request->get('pagoadministrativo');
       $cliente->marca = $request->get('marca');
       $cliente->modelo = $request->get('modelo');
       $cliente->chasis = $request->get('chasis');
       $cliente->motor = $request->get('motor');
       $cliente->color = $request->get('color');
       $cliente->dua = $request->get('dua');
       $cliente->item = $request->get('item');
       $cliente->tipovehiculo = $request->get('tipovehiculo');
       $cliente->tipoventa = $request->get('tipoventa');
       $cliente->montodelacompra = $request->get('montodelacompra');

       $cliente->save();


      // return redirect()->route('admin.clientes.edit', $cliente)->with('flash', 'Tu publicación fue guardada Con éxito');
       //return redirect()->route('admin.clientes.edit', $cliente)->with('flash', 'Tu publicación fue guardada Con éxito');
       return back()->with('info','El Cliente fue actualizado Con éxito');

    }


    public function destroy(Cliente $cliente)
    {
       // $this->authorize('author', $post);
       $this->authorize('misclientes', $cliente);
        $cliente->delete();
        return redirect()->route('admin.clientes.index')->with('info', 'El Cliente se elimino con exito');
    }
}
