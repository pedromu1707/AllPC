@extends('layouts.auth')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('auth.verificar') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                        {{ trans('auth.link') }}
                        </div>
                    @endif

                    {{ trans('auth.verificar2') }}
                    {{ trans('auth.noemail') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ trans('auth.otroemail') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection