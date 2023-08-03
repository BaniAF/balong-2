<!-- resources/views/contact/thankyou.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thank You') }}</div>

                    <div class="card-body">
                        <p>Thank you for contacting me. Your message has been received.</p>
                        <button class="btn btn-success"><a href="{{ route('landing') }}"
                                class="btn btn-primary">Home</a></button>
                        <button class="btn btn-error"><a href="{{ route('contact.form') }}" class="btn btn-secondary">Contact
                                Me</a></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
