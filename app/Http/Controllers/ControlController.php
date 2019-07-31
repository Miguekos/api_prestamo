<?php

namespace App\Http\Controllers;

use App\Control;
use App\Cliente;
use App\Pago;
use DateTime;
use Illuminate\Http\Request;

class ControlController extends Controller
{

      public function __construct()
      {
        //   $this->middleware('auth');
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $now = new DateTime('America/Lima');
      // $hora = $now->format('d-M-Y H:i:s');
      $hora = $now->format('y/m/d H:i:s');
      $id = auth()->user()->id;
      $cliente = Cliente::where([
        ['agregado_id','=',$id],
        // ['updated_at', '<', date('Y-m-d')],
        ['abono_id','=',0],
        ['deuda','!=',0],
      ])->latest()->limit(2000)->get();

      $abonos = Cliente::where([
        ['agregado_id','=',$id],
        // ['updated_at', '>', date('Y-m-d')],
        ['abono_id','=',1],
      ])->latest()->limit(2000)->get();
      // return $abonos;
      $control = Control::where('id',$id)->latest()->limit(2000)->get();

      return response()->json([
        'clientesSinAbonos' => $cliente,
        'clientesConAbonos' => $abonos
        ]);

    //   return view('controls.index',compact('control','cliente','hora','abonos'));
    }

    public function getControl($id)
    {
      $now = new DateTime('America/Lima');
      // $hora = $now->format('d-M-Y H:i:s');
      $hora = $now->format('y/m/d H:i:s');
    //   $id = auth()->user()->id;
      $cliente = Cliente::where([
        ['agregado_id','=',$id],
        // ['updated_at', '<', date('Y-m-d')],
        ['abono_id','=',0],
        ['deuda','!=',0],
      ])->latest()->limit(2000)->get();

      $abonos = Cliente::where([
        ['agregado_id','=',$id],
        // ['updated_at', '>', date('Y-m-d')],
        ['abono_id','=',1],
      ])->latest()->limit(2000)->get();
      // return $abonos;
      $control = Control::where('id',$id)->latest()->limit(2000)->get();

      return response()->json([
        'clientesSinAbonos' => $cliente,
        'clientesConAbonos' => $abonos
        ]);

    //   return view('controls.index',compact('control','cliente','hora','abonos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function show(Control $control)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function edit(Control $control)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Control $control)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function destroy($control)
    {
        $cliente = Pago::where([
            'cliente_id' => $control,
        ])->first();
        // $clientes  = Pago::find($control);
        // dd($cliente);
        
        // return $cliente->abono;

        $flight = Cliente::find($control);
        $flight->deuda = $flight->deuda + $cliente->abono;
        $flight->abono_id = 0;
        $flight->save();
        
        
        $cliente->delete();
        // return back()->with('flash','Se elimino el abono correctamente..!!');
        return response()->json([
            'mensaje' => 'Se elimino el abono correctamente..!!'
        ]);
    }

        public function limpiar_cliente($id)
    {

        Cliente::where('abono_id', 1)
            ->where('agregado_id',$id)
            ->update(['abono_id' => 0]);
     
        // return back()->with('success','Se resetearon los depositos correctamente..!!');
        return response()->json([
            'mensaje' => 'Se resetearon los depositos correctamente..!!'
        ]);
    }
}
