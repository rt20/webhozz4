@extends('layouts.app')

@section('content')
<div class="container">
     <div class="row">
          <div class="col-md-12">
               <div class="card">
                    <div class="card-header">Impersonate</div>
                    <div class="card-body">
                         <div class="table-responsive">
                              <table class="table table-striped table-hover">
                                   <thead>
                                        <tr class="no-b">
                                             <th>#</th>
                                             <th>Username</th>
                                             <th>Name</th>
                                             <th>Email</th>
                                             <th>Created At</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        @foreach ($rows as $row)
                                        <tr>
                                             <td>{{ $loop->index + 1 }}</td>
                                             <td>
                                                  <a href="{{ route('impersonate.impersonate', ['id' => $row->id]) }}">
                                                       {{ $row->username }}
                                                  </a>
                                             </td>
                                             <td>{{ $row->name }}</td>
                                             <td>{{ $row->email }}</td>
                                             <td>{{ $row->created_at }}</td>
                                        </tr>
                                        @endforeach
                                   </tbody>
                              </table>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection