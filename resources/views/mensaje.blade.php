@foreach($mensaje as $m)
        Mensaje: {{$m->mensaje}}
        <br>
        Nº: {{$m->id}}
@endforeach