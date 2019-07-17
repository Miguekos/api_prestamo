@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Montos para inciar</h4></div>
                <div class="panel-body">
                  <form class="" action="{{ route('cierre.update',$montos->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                  <div class="form-group col-sm-4">
                    <label for="">Monto</label>
                    <input class="form-control" type="text" name="monto" value="{{ $montos->monto }}">
                    <input class="btn btn-sm btn-success" type="submit" value="Actualizar">
                  </div>
                </form>

                </div>
                <div class="panel-footer">
                  <small>miguekos1233@gmail.com</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
