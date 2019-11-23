@extends('laraboi.app')

@section('content')
<form action="{{ route('audit.update', $audit->id) }}" method="POST">
     @csrf
     {{ method_field("PATCH") }}
     <div class="col-md-6">
          <label>Name</label>
          <input type="text" name="name" class="form-control" value="{{ $audit->name }}">
     </div>
     <div class="col-md-6">
          <label>Anggaran</label>
          <select name="anggaran_id" class="form-control" disabled>
               <option value="">Please Select</option>
               @foreach($anggarans as $anggaran) 
                    <option value="{{ $anggaran->id }}" {{ $audit->anggaran_id == $anggaran->id ? 'selected' : null }}>{{ $anggaran->name }} - {{ $anggaran->budget }}</option>
               @endforeach
          </select>
     </div>
     <div class="col-md-6">
          <label>Biaya</label>
          <input type="number" name="biaya" class="form-control" value="{{ $audit->biaya }}" disabled>
     </div>
     <div class="col-md-6">
          <label>Description</label>
          <textarea name="description" cols="30" rows="10" class="form-control">{{ $audit->description }}</textarea>
     </div>
     <div class="col-md-6 mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
     </div>
</form>
@endsection
