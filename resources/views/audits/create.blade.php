@extends('laraboi.app')

@section('content')

@include('shared.errors')
<form action="/audit" method="POST">
     @csrf
     <div class="col-md-6">
          <label>Name</label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}">
     </div>
     <div class="col-md-6">
          <label>Anggaran</label>
          <select name="anggaran_id" class="form-control">
               <option value="">Please Select</option>
               @foreach($anggarans as $anggaran) 
                    <option value="{{ $anggaran->id }}" {{ old('anggaran_id') == $anggaran->id ? 'selected' : null }}>{{ $anggaran->name }} - {{ $anggaran->budget }}</option>
               @endforeach
          </select>
     </div>
     <div class="col-md-6">
          <label>Biaya</label>
          <input type="number" name="biaya" class="form-control" value="{{ old('biaya') }}">
     </div>
     <div class="col-md-6">
          <label>Description</label>
          <textarea name="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
     </div>
     <div class="col-md-6 mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
     </div>
</form>
@endsection
