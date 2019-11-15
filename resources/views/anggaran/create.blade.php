@extends('laraboi.app')

@section('content')
<form action="/anggaran" method="POST">
     @csrf
     <div class="col-md-6">
          <label>Kode Anggaran</label>
          <input type="text" name="kode" placeholder="eg: 121837182" class="form-control" required>
     </div>
     <div class="col-md-6">
          <label>Name</label>
          <input type="text" name="name" class="form-control" required>
     </div>
     <div class="col-md-6">
          <label>Budget</label>
          <input type="number" name="budget" class="form-control" required>
     </div>
     <div class="col-md-6">
          <label>Biaya</label>
          <input type="number" name="biaya" class="form-control">
     </div>
     <div class="col-md-6">
          <label>Sisa</label>
          <input type="number" name="sisa" class="form-control">
     </div>
     <div class="col-md-6 mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
     </div>
</form>
@endsection