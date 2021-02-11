@extends ('layout')

@section('contenido')
<table class="table table-bordered table-striped table-hover" id="tabla-agenda">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Teléfono</th>
      <th>E-mail</th>
    </tr>
  </thead>
</table>
@stop

@section('head')
  @include('datatables')
@stop

@section('js')

function fDatatable() {
  $('#tabla-agenda').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: "{{route('ajax.tabla')}}",
      type: "GET"
    },
    columns: [
    {data: 'nombre', name: 'nombre'},
    {data: 'telefono', name: 'telefono', orderable: false},
    {data: 'email', name: 'email'},
    ]
  });
}
$(document).ready(function() {
  fDatatable();
})
@stop
