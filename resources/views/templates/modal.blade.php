 <div class="container">

    <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <div class="modal fade" id="myModal{{ $clientes->id }}" role="dialog">
        <form action="{{ route('pago.store') }}" method="post">
            {{ csrf_field() }}
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title pull-right">Abonar a cuenta de {{ $clientes->nombre }} -- Pago por dia: {{ $clientes->pago_dia }} ./S</h4>
                    <input type="hidden" name="nombre" value="{{ $clientes->nombre }}">
                    <input type="hidden" name="cliente_id" value="{{ $clientes->id }}">
                </div>
                <div class="modal-body">
                  <div class="form-group col-md-6">
                    <label for="deuda">Deuda</label>
                    <input type="text" class="form-control" value="{{ $clientes->deuda }}" name="deuda" id="deuda">
                    <input type="hidden" class="form-control" value="{{ $clientes->prestamo }}" name="prestamo" id="prestamo">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="abono">Abono</label>
                    <input type="text" class="form-control" required name="abono" id="abono">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="fecha">Fecha</label>
                    <input type="text" class="form-control" name="fecha" value="{{ $hora }}" id="fecha">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="a_caja">A Caja</label>
                    <select class="form-control" name="a_caja">
                      <option value="Si">Si</option>
                      @if(auth()->user()->user_id == 1)
                      <option value="No">No</option>
                      @endif
                    </select>
                  </div>
                </div>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="cerrar" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="guardar" class="btn btn-default">Guardar</button>
                </div>
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="usuario" value="{{ auth()->user()->name }}">
            </div>
        <!-- </div> -->
        </form>
    </div>
</div>
