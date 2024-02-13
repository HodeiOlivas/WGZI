@extends('app')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    
    <form action="{{ route('kategoria.update', ['id' => $kategoria->id]) }}" method="POST">
    @method('PATCH')
    @csrf

        <div class="mb-3 col">

        @error('izena')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

         @error('kolorea')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif

            <label for="exampleFormControlInput1" class="form-label">Kategoria izena</label>
            <input type="text" class="form-control mb-2" name="izena" id="exampleFormControlInput1" placeholder="Kategoria" value="{{ $kategoria->izena }}">
           
            <label for="exampleColorInput" class="form-label">Kategoriaren kolorea aukeratu</label>
            <input type="color" class="form-control form-control-color" name="kolorea" id="exampleColorInput" value="{{ $kategoria->kolorea }}" title="Choose your color">

            <button type="submit" class="btn btn-primary">Eguneratu kategoria</button>
        </div>
    </form>

    <div >
    @if ($kategoria->atasak->count() > 0)
        @foreach ($kategoria->atasak as $atasa )
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="{{ route('atasak.edit', ['id' => $atasa->id]) }}">{{ $atasa->izena }}</a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('atasak.destroy', [$atasa->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Ezabatu</button>
                    </form>
                </div>
            </div>
        @endforeach    
    @else
        Ez dago kategoria honetarako atasarik.
    @endif
   
    </div>
    </div>
</div>
@endsection