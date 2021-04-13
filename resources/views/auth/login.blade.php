@extends('layouts.main')

@section('content')
    <div class="container mt-30">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <h3 class="card-header mb-20">{{ __('Login') }}</h3>

                    <div class="card-body bg-dark">
                       <div class="row">
                           {!! Form::open(['route' => 'login', 'method' => 'post']) !!}

                           <div class="form-group">
                               <label for="email">Email</label>
                               {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'required' => true]) !!}
                           </div>

                           <div class="form-group">
                               <label for="password">Password</label>
                               {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'required' => true]) !!}
                           </div>

                           <div class="form-group">
                               <div class="form-check">
                                    {!! Form::checkbox('remember', 1, null, ['class' => 'form-check-input', 'id' => 'remember']) !!}

                                   <label class="form-check-label" for="remember">
                                       {{ __('Remember Me') }}
                                   </label>
                               </div>
                           </div>

                           <div class="form-group mb-0">
                               <button type="submit" class="btn btn-primary">
                                   {{ __('Login') }}
                               </button>

                               @if (Route::has('password.request'))
                                   <a class="btn btn-link" href="{{ route('password.request') }}">
                                       {{ __('Forgot Your Password?') }}
                                   </a>
                               @endif
                           </div>
                           {!! Form::close() !!}
                       </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
