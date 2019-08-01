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

    public function getCierre($id, $porcent_id)
    {
      $id = $id;
      $horaS = Report::where('usuario_id',$id)->orderBy('created_at','desc')->first();

      if ($horaS) {
        $ultimafecha = $horaS->created_at;

      }else{
        $ultimafecha = date('Y-m-d', strtotime('-1 week'));
      }

      $id = $id;
      $recaudado= Pago::where([
        ['user_id', '=', $id],
        ['a_caja', '=', 'Si'],
        ['created_at', '>', $ultimafecha],
        ])->sum('abono');
        $porcent = $porcent_id;
        $porce = $porcent / 100;
        $ganancia = $porce * $recaudado;
        // $entregar1 = $recaudado - $ganancia;
        $entregar1 = $recaudado;

      //Deposito
          $inicio = Cierre::where([
            ['user_id', '=', $id],
            ['accion', '=', 'deposito'],
            ['created_at', '>', $ultimafecha],
            ])->get();
          $inicio_suma = Cierre::where([
            ['user_id', '=', $id],
            ['accion', '=', 'deposito'],
            ['created_at', '>', $ultimafecha],
          ])->sum('monto');
      //Retiro
          $fin = Cierre::where([
            ['user_id', '=', $id],
            ['accion', '=', 'retiro'],
            ['created_at', '>', $ultimafecha],
            ])->get();
          $fin_resta = Cierre::where([
            ['user_id', '=', $id],
            ['accion', '=', 'retiro'],
            ['created_at', '>', $ultimafecha],
          ])->sum('monto');

            $entregar2 = $entregar1 + $inicio_suma;
            $entregar = round($entregar2 - $fin_resta);


        $reporte = Report::where('usuario_id',$id)->get();
        

          // return view('cierre.index',compact('inicio','inicio_suma','fin','fin_resta','recaudado','ganancia','entregar','reporte','recaudado_t'));
          return response()->json([
            'inicio' => $inicio,
            'inicio_suma' => number_format($inicio_suma,2,",","."),
            'fin' => $fin,
            'fin_resta' => number_format($fin_resta,2,",","."),
            'recaudado' => number_format($recaudado,2,",","."),
            'ganancia' => number_format($ganancia,2,",","."),
            'entregar' => number_format($entregar,2,",","."),
            'reporte' => $reporte,
          ]);
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
