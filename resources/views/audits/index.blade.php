@extends('laraboi.app')

@section('content')
<a href="{{ route('audit.create') }}" class="btn btn-primary mb-3">Create new audit</a>

<table class="table">
     <thead class="thead-light">
          <tr>
               <th scope="col">#</th>
               <th scope="col">Anggaran</th>
               <th scope="col">Name</th>
               <th scope="col">Biaya</th>
               <th scope="col" colspan="2">Action</th>
          </tr>
     </thead>
     <tbody>
          @foreach($data as $row)
          <tr>
               <th>{{ $row->id }}</th>
               <td>{{ $row->anggaran->name }}</td>
               <td>{{ $row->name }}</td>
               <td>{{ $row->biaya }}</td>
               <td>
                    <a href="{{ route('audit.edit', $row->id) }}" class="btn btn-success">Edit</a>
               </td>
               <td>
                    <form action="{{ route('audit.destroy', $row->id) }}" method="POST">
                         @csrf
                         {{ method_field('DELETE') }}
                         <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
               </td>
          </tr>
          @endforeach
     </tbody>
</table>
@endsection
