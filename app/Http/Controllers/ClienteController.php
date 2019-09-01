<?php

namespace App\Http\Controllers;

use App\User;
use App\Control;
use App\Cliente;
use DateTime;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
  static public function hora()
  {
    $now = new DateTime('America/Lima');
    // $hora = $now->format('d-M-Y H:i:s');
    return $now->format('y/m/d H:i:s');
  }

  public function __construct()
  {
    //          $this->middleware('auth');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $cliente = Cliente::where('deuda', '!=', 0.00)->get();
    $clientesd = Cliente::where('deuda', 0.00)->get();
    //        return $cliente;

    //        return view('clientes.index',compact('cliente','clientesd'));
    return response()->json([
      'cliente' => $cliente,
      'clientesd' => $clientesd,
    ], 200);
  }

  public function getCliente($id)
  {
    if ($id == 1) {
      $cliente = Cliente::where('deuda', '!=', 0.00)
        ->get();
      $clientesd = Cliente::where('deuda', 0.00)
        ->get();
      return response()->json([
        'cliente' => $cliente,
        'clientesd' => $clientesd,
      ], 200);
    } else {
      $cliente = Cliente::where('deuda', '!=', 0.00)
        ->where('agregado_id', '=', $id)
        ->get();
      $clientesd = Cliente::where('deuda', 0.00)
        ->where('agregado_id', '=', $id)
        ->get();
      return response()->json([
        'cliente' => $cliente,
        'clientesd' => $clientesd,
      ], 200);
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //   $now = new DateTime('America/Lima');
    // $hora = $now->format('d-M-Y H:i:s');
    //   $hora = $now->format('d/m/Y');
    // $hora = $this->hora();
    return view('clientes.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $cliente = Cliente::create($request->all());
    // $flight = Cliente::find($control);
    // $flight->deuda = $flight->deuda + $cliente->abono;
    // return response()->json($cliente, 200);
    // return redirect()->route('cliente.index')->with('success','Se guardo correctammente el cliente');
    return $request->all();
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Cliente  $cliente
   * @return \Illuminate\Http\Response
   */
  public function show($cliente)
  {
    $clientes = Cliente::findOrFail($cliente);
    return view('clientes.show', compact('clientes'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Cliente  $cliente
   * @return \Illuminate\Http\Response
   */
  public function edit(Cliente $cliente)
  {

    return view('clientes.edit', compact('cliente'));
    // $clientes = Cliente::findOrFail($cliente);
    // return view('clientes.edit',compact('clientes'));
    // return $clientes->nombre;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Cliente  $cliente
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $cliente)
  {
    $clientes  = Cliente::findOrFail($cliente);
    $input = $request->all();
    $clientes->fill($input)->save();
    return back()->with('flash', 'Se actualizo el empleado correctamente');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Cliente  $cliente
   * @return \Illuminate\Http\Response
   */
  public function destroy(Cliente $cliente)
  {
    $clientes  = Cliente::findOrFail($cliente);
    $cliente->delete();
    return redirect()->route('cliente.index')->with('flash', 'Se elimino el cliente correctamente..!!');
  }

  public function limpiarClientes()
  {
    $clientesd = Cliente::where('deuda', 0.00)->get();
    foreach ($clientesd as $clientesds) {
      $id = $clientesds->id;
      Cliente::destroy($id);
    }
    return redirect()->route('cliente.index')->with('flash', 'Se elimino el cliente correctamente..!!');
  }
}
