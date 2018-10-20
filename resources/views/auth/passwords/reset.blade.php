@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('message.reset_password')</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'password.update', 'method' => 'POST']) !!}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            {!! Form::label('email', trans('message.email_address'), ['class' => 'col-sm-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {!! Form::email('email', $email ?? old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),'required','autofocus' ]) !!}

                                 @include('errors.error')
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password', trans('message.password'), ['class' => 'col-sm-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'required']) !!}

                                @include('errors.error')
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password-confirm', trans('message.confirm_password'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                 {!! Form::password('password_confirmation', ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! Form::submit(trans('message.reset_password'), ['class' => 'btn btn-primary'] ) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
