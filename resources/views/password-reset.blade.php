<!-- resources/views/password-reset.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container vh-100">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-md-6">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Reset Password') }}</div> --}}

                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('assets/img/home/FLTlogo.png') }}" height="80" width="350" alt="Logo"
                                class="mb-4">
                            <h3>Reset your Password</h3>
                            <h6>Please enter your password below to reset</h6>
                        </div>
                        <div class="mt-3">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif

                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>
                        <form method="POST" action="{{ url('/password/reset/' . $token) }}" class="text-center">
                            @csrf
                            <div class="form-group row mt-4 text-center">
                                <div class="col-md-11">
                                    <input id="password" type="password" class="form-control input-style" name="password"
                                        required placeholder="New Password">
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input id="password_confirmation" type="password" class="form-control input-style"
                                        name="password_confirmation" required placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-style">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
