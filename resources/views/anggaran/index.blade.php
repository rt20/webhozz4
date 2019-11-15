@extends('laraboi.app')

@section('content')
<a href="/anggaran/create" class="btn btn-primary mb-3">Create new anggaran</a>

<table class="table">
     <thead class="thead-light">
          <tr>
               <th scope="col">#</th>
               <th scope="col">Code</th>
               <th scope="col">Name</th>
               <th scope="col">Budget</th>
               <th scope="col">Biaya</th>
               <th scope="col">Sisa</th>
               <th scope="col">Action</th>
          </tr>
     </thead>
     <tbody>
          @foreach($data as $row)
          <tr>
               <th>{{ $row->id }}</th>
               <td>{{ $row->code }}</td>
               <td>{{ $row->name }}</td>
               <td>{{ $row->budget }}</td>
               <td>{{ $row->biaya }}</td>
               <td>{{ $row->sisa }}</td>
               <td>
                    <a href="">Edit</a>
                    <a href="">Delete</a>
               </td>
          </tr>
          @endforeach
     </tbody>
</table>
@endsection