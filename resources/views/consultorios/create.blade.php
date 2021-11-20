
<form action="{{ url('/consultorios') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

@include('consultorios.form',['Modo'=>'crear'])


</form>

