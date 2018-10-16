@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('message.verify_email_address')</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            @lang('message.sent_to_email_address')
                        </div>
                    @endif

                    @lang('message.chek_your_email_link')
                    @lang('message.receive_email'), <a href="{{ route('verification.resend') }}">@lang('message.request_another')</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
