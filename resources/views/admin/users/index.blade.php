@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des utilisateurs</div>
                <div class="card-body">
                  
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                            @foreach($users as $user)
                            {{-- {{ $user->name .'-  '.$user->email }} --}}
                             <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{  implode(',',$user->roles->pluck('name')->toArray()) }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit',$user->id) }} " class="btn btn-primary">Editer</a>
                                    

                                    <form action="{{ route('admin.users.destroy',$user->id) }}" method="post" class="d-inline">
                                        @csrf 
                                        @method('DELETE')
                                         <button type="submit"  class="btn btn-warning">Supprimer</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
        
                         
                         
                        </tbody>
                      </table>
                      
                      




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
