@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('message.login')</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}

                        <div class="form-group row">
                            {!! Form::label('email', 'E-Mail Address', ['class' => 'col-sm-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::email('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),'required','autofocus' ]) !!}

                                @include('errors.error')
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password', 'Password', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'required']) !!}

                                @include('errors.error')
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    {!! Form::checkbox('remember',null, ['class' => 'form-check-input', old('remember') ? 'checked' : '']) !!}

                                    {!! Form::label('remember', trans('message.remember'), ['class' => 'form-check-label']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {!! Form::submit(trans('message.login'), ['class' => 'btn btn-primary'] ) !!}

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    @lang('message.forgot_password')
                                </a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
