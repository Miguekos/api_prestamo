<?php

namespace App\Http\Controllers;
use DateTime;
use App\Pago;
use App\Nomina;
use App\Cliente;
use App\Cierre;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $now = new DateTime('America/Lima');
      // $hora = $now->format('d-M-Y H:i:s');
      // $hora + $now->format('y/m/d H:i:s');
      //sumar y calcular por usuarios

    //   $cliente = Cliente::all();
      $cliente = Cliente::limit(2000)->get();
      
      $id = auth()->user()->id;
      // $existe = Cierre::where([
      //   ['user_id', '=', $id],
      //   ['created_at', '>', date('Y-m-d')],
      //   ])->first();
      $existe = Cierre::where([
        ['user_id', '=', $id],
        ])->first();
      if ($existe){
        $inicio_m = Cierre::where('user_id',$id)->orderBy('id','desc')->first();
        $inicio_m = $inicio_m->monto;
        $suma= Pago::where([
          'user_id' => $id,
          'a_caja' => 'Si',
          ])->sum('abono');
        $porcent = auth()->user()->porcent_id;
        $porce = $porcent / 100;
        $total = $porce * $suma;
        // $pago = Pago::all()->where('user_id', $id);
        $pago = Pago::where('user_id', $id)->limit(2000)->latest()->get();
        $calcu = $suma - $total;
        // $entregar = $calcu + $inicio_m;
        $entregar = $calcu;
        // return view('balance.index',compact('pago','total','porcent','entregar','suma'));
        return response()->json([
          'pago' => $pago,
          'total' => $total,
          'porcent' => $porcent,
          'entregar' => $entregar,
          'suma' => $suma
        ]);
      }else{
        // return redirect()->route('dashboard')->with('flash','El usuario no tiene caja chica..!');
        return response()->json([
          'mensaje' => 'El usuario no tiene caja chica..!'
        ]);
      }

      // return "Estoy aqui";
    }

    public function getPagos($id, $porcent)
    {
        // $now = new DateTime('America/Lima');
      // $hora = $now->format('d-M-Y H:i:s');
      // $hora + $now->format('y/m/d H:i:s');
      //sumar y calcular por usuarios

    //   $cliente = Cliente::all();
      $cliente = Cliente::limit(2000)->get();
      
      // $id = auth()->user()->id;
      // $existe = Cierre::where([
      //   ['user_id', '=', $id],
      //   ['created_at', '>', date('Y-m-d')],
      //   ])->first();
      $existe = Cierre::where([
        ['user_id', '=', $id],
        ])->first();
      if ($existe){
        $inicio_m = Cierre::where('user_id',$id)->orderBy('id','desc')->first();
        $inicio_m = $inicio_m->monto;
        $suma= Pago::where([
          'user_id' => $id,
          'a_caja' => 'Si',
          ])->sum('abono');
        // $porcent = auth()->user()->porcent_id;
        $porce = $porcent / 100;
        $total = $porce * $suma;
        // $pago = Pago::all()->where('user_id', $id);
        $pago = Pago::where('user_id', $id)->limit(2000)->latest()->get();
        $calcu = $suma - $total;
        // $entregar = $calcu + $inicio_m;
        $entregar = $calcu;
        // return view('balance.index',compact('pago','total','porcent','entregar','suma'));
        return response()->json([
          'pago' => $pago,
          'total' => $total,
          'porcent' => $porcent,
          'entregar' => $entregar,
          'suma' => $suma
        ]);
      }else{
        // return redirect()->route('dashboard')->with('flash','El usuario no tiene caja chica..!');
        return response()->json([
          'mensaje' => 'El usuario no tiene caja chica..!'
        ]);
      }

      // return "Estoy aqui";
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

      // return $request->all();

        $now = new DateTime('America/Lima');
        // $hora = $now->format('d-M-Y H:i:s');
        $hora = $now->format('y/m/d');

      //variables
      $abono = $request->abono;
      $deuda = $request->deuda;
      $nueva_deuda = $deuda - $abono;

      // $porcen = auth()->user()->porcent_id;
      $porcen = $request->porcent_id;
      // echo 'Porcentaje';
      // echo $porcen;

      // return $request->all();
      //Actualizar valor en tabla cliente

      $flight = Cliente::find($request->id);
      $flight->deuda = $nueva_deuda;
      $flight->abono_id = 1;
      $flight->save();

      $pago = Pago::create([
        'name' => $request->name,
        'cliente_id' => $request->id,
        'deuda' => $nueva_deuda,
        'prestamo' => $request->prestamo,
        'abono' => $request->abono,
        'fecha' => $request->fecha,
        'a_caja' => $request->a_caja,
        'user_id' => $request->user_id,
        'usuario' => $request->usuario,
      ]);

      // echo $pago;

      $porcenta = $porcen / 100;
      $ganancia_em = $porcenta * $request->abono;

      $nomina = Nomina::create([
        'usuario' => $request->usuario,
        'user_id_nomina' => $request->user_id,
        'abono_recaudado' => $request->abono,
        'pago_empleado' => $ganancia_em,
      ]);

      // return redirect()->route('control.index');
      return response()->json([
        'estado' => '00',
        'mensaje' => 'Se verifico el pago conforme'
      ]);

      //agregar registro para el control de usuarios
      // $pago = Pago::create($request->all());

      // $flight = Pago::find($request->id);
      // $flight->deuda = $nueva_deuda;
      // $flight->save();
      //
      // if (auth()->user()->user_id == 1){
      //   return redirect()->route('control_admin');
      //   }else{
      //   return redirect()->route('control.index');
      //   }
      // return $update;
      //redirigir y cargar datos en la vista
      // return view('balance.index',compact('total'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }

}
