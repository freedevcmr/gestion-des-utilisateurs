@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier {{ $user->name }}</div>
                <div class="card-body">
                 <form action="{{ route('admin.users.update',$user) }}" method="POST">
                    @csrf 
                    @method('PATCH')

                    <div class="form-group row ">
                        <label for="nom" class=" col-form-label">{{ __('Nom') }}</label>

                        <div class="col-md-12">
                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom', $user->name) }}" required autocomplete="nom">

                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="email" class=" col-form-label">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    @foreach ($roles as $role )
                    <div class="form-group form-check">
                        <input type="checkbox" name="roles[]" id="{{ $role->id }}" value="{{ $role->id }}" class="form-check-input"
                        @foreach ($user->roles as $userRole )
                           @if($userRole->id == $role->id)
                           checked
                           @endif 
                        @endforeach
                        />
                        <label for="{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                    </div>
                      
                  @endforeach
                      
                    <button type="submit" class="btn btn-primary">Modifier les roles</button>

                 </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection 