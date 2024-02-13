@extends('app')

@section('content')

<div class="container w-25 border p-4 mt-4">
    <div class="row mx-auto">

        <form action="{{ route('kategoria.store') }}" method="POST">
            @csrf

            @if (session ('success'))
            <h6 class="alert alert-success"> {{ session('success')}} </h6>
            @endif

            @error('izena')
            <h6 class="alert alert-danger"> {{ $message }} </h6>
            @enderror


            <div class="mb-3">
                <label for="izena" class="form-label">Kategoriaren Izena</label>
                <input type="text" name="izena" class="form-control">
            </div>

            <div class="mb-3">
                <label for="kolorea" class="form-label">Kategoriaren kolorea</label>
                <input type="color" name="kolorea" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Sortu Kategoria</button>
        </form>

        <div>
            @if(isset($kategoriak) && $kategoriak->isNotEmpty())
            @foreach ($kategoriak as $kategoria)
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="{{ route('kategoria.edit', ['id' => $kategoria->id]) }}">
                        <span class="color-container" style="background-color: {{$kategoria->kolorea}}"></span> {{
                        $kategoria->izena }}
                    </a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">

                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('kategoria.destroy', ['kategoria' => $kategoria->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Ezabatu
                                Kategoria</button>
                        </form>
                    </div>


                </div>
            </div>
            @endforeach
            @else
            <p>No hay datos disponibles.</p>
            @endif


        </div>
    </div>
</div>

@endsection