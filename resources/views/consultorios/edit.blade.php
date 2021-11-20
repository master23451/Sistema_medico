<form action="{{ route('consultorios.update' , $consultorio->id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}

@include('consultorios.form',['Modo'=>'editar'])
</form>
<br/>


</form>
