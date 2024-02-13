@extends('app')

@section('content')

<div class="container w-25 border p-4 mt-4">

<form action="{{ route('atasak.update', ['id' => $atasa->id]) }}" method="POST">
    @method('PATCH')
    @csrf

    @if (session ('success'))
        <h6 class="alert alert-success"> {{ session('success')}} </h6>
    @endif

    @error('izena')
        <h6 class="alert alert-danger"> {{ $message }} </h6>
    @enderror


  <div class="mb-3">
    <label for="izena" class="form-label">Atasaren Izena</label>
    <input type="text" name="izena" class="form-control" value="{{ $atasa->izena }}">
  </div>
  <button type="submit" class="btn btn-primary">Eguneratu atasa</button>
</form>

</div>

@endsection
