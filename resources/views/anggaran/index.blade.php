@extends('laraboi.app')

@section('content')
<a href="{{ route('anggaran.create') }}" class="btn btn-primary mb-3">Create new anggaran</a>
<a href="{{ route('anggaran.export') }}" class="btn btn-success mb-3 ml-4">Export</a>


<form action="{{ route('anggaran.import') }}" method="POST" enctype="multipart/form-data">
     @csrf
     <input type="file" name="file">
     <button type="submit" class="btn btn-info">Upload</button>
</form>

<table class="table">
     <thead class="thead-light">
          <tr>
               <th scope="col">#</th>
               <th scope="col">Code</th>
               <th scope="col">Name</th>
               <th scope="col">Budget</th>
               <th scope="col">Biaya</th>
               <th scope="col">Sisa</th>
               <th scope="col" colspan="2">Action</th>
          </tr>
     </thead>
     <tbody>
          @foreach($data as $row)
          <tr>
               <th>{{ $loop->index + 1 }}</th>
               <td>{{ $row->code }}</td>
               <td>{{ $row->name }}</td>
               <td>{{ $row->budget }}</td>
               <td>{{ $row->biaya }}</td>
               <td>{{ $row->sisa }}</td>
               <td>
                    <a href="{{ route('anggaran.edit', $row->id) }}" class="btn btn-success">Edit</a>
               </td>
               <td>
                    <form action="{{ route('anggaran.destroy', $row->id) }}" method="POST">
                         @csrf
                         {{ method_field('DELETE') }}
                         <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
               </td>
          </tr>
          @endforeach
     </tbody>
</table>

{!! $data->render() !!}
@endsection