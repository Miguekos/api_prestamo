<?php

namespace App\Http\Controllers;

use App\Cierre;
use App\Pago;
use App\Nomina;
use App\Cliente;
use App\Report;
use Illuminate\Http\Request;

class CierreController extends Controller
{
  public function __construct()
  {
      // $this->middleware('auth');
  }

    public function index()
    {
      $id = auth()->user()->id;
      $horaS = Report::where('usuario_id',$id)->orderBy('created_at','desc')->first();

      if ($horaS) {
        $ultimafecha = $horaS->created_at;

      }else{
        $ultimafecha = date('Y-m-d', strtotime('-1 week'));
      }

      $id = auth()->user()->id;
      $recaudado= Pago::where([
        ['user_id', '=', $id],
        ['a_caja', '=', 'Si'],
        ['created_at', '>', $ultimafecha],
        ])->sum('abono');
        $porcent = auth()->user()->porcent_id;
        $porce = $porcent / 100;
        $ganancia = $porce * $recaudado;
        // $entregar1 = $recaudado - $ganancia;
        $entregar1 = $recaudado;

      //Deposito
          $inicio = Cierre::where([
            ['user_id', '=', auth()->user()->id],
            ['accion', '=', 'deposito'],
            ['created_at', '>', $ultimafecha],
            ])->get();
          $inicio_suma = Cierre::where([
            ['user_id', '=', auth()->user()->id],
            ['accion', '=', 'deposito'],
            ['created_at', '>', $ultimafecha],
          ])->sum('monto');
      //Retiro
          $fin = Cierre::where([
            ['user_id', '=', auth()->user()->id],
            ['accion', '=', 'retiro'],
            ['created_at', '>', $ultimafecha],
            ])->get();
          $fin_resta = Cierre::where([
            ['user_id', '=', auth()->user()->id],
            ['accion', '=', 'retiro'],
            ['created_at', '>', $ultimafecha],
          ])->sum('monto');

            $entregar2 = $entregar1 + $inicio_suma;
            $entregar = round($entregar2 - $fin_resta);


        $reporte = Report::where('usuario_id',auth()->user()->id)->get();
        

          return view('cierre.index',compact('inicio','inicio_suma','fin','fin_resta','recaudado','ganancia','entregar','reporte','recaudado_t'));
    }

    public function store(Request $request)
    {
      // return $request->all();
      $cierre = Cierre::create($request->all());
      return back()->with('flash','Se agrego monto para inicar el dia');
    }

    public function edit($monto)
    {
      $montos = Cierre::find($monto);
      return view('cierre.edit',compact('montos'));
    }

    public function update(Request $request, $monto)
    {
      $montos  = Cierre::find($monto);
      $input = $request->all();
      $montos->fill($input)->save();
      return back()->with('flash','Se actualizo el empleado correctamente');
    }
}
