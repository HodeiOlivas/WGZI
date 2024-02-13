@extends('app')
@section('content')
<div class="container w-25 border p-4 mt-4">

<form action="/atasak" method="POST">
@csrf

@if (session ('success'))
    <h6 class="alert alert-success"> {{ session('success')}} </h6>
@endif

@error('izena')
    <h6 class="alert alert-danger"> {{ $message }} </h6>
@enderror
  <div class="mb-3">
    <label for="izena" class="form-label">Atasaren Izena</label>
    <input type="text" name="izena" class="form-control">
  
    <label for="kategoria_id" class="form-label">Atazaren kategoria</label>
            <select name="kategoria_id" class="form-select">
                @foreach ($kategoriak as $kategoria)
                    <option value="{{$kategoria->id}}">{{$kategoria->izena}}</option>
                @endforeach
            </select>

</div>
  <button type="submit" class="btn btn-primary">Sortu atasa</button>
</form>


<div>

@if(isset($atasak) && $atasak->isNotEmpty())
    @foreach ($atasak as $atasa)
        <div class="row py-1">
            <div class="col-md-9 d-flex align-items-center">
                <a href="{{ route('atasak.edit', ['id' => $atasa->id]) }}">{{ $atasa->izena }}</a>
            </div>
            <div class="col-md-3 d-flex justify-content-end">
            <!-- apia erabiliz ezabatu-->
            <form action="{{ url('/api/atasak', ['id' => $atasa->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm">Ezabatu</button>
                </form>
            </div>
        </div>
    @endforeach
@else
<p>No hay datos disponibles.</p>
@endif
</div>


@endsection