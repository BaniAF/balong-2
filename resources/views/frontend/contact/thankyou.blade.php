<!-- resources/views/contact/thankyou.blade.php -->

@extends('frontend.layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <div class="flex justify-center">
        <div class="w-full md:w-8/12">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="text-xl font-semibold mb-4">{{ __('Thank You') }}</div>

                <div class="text-gray-700">
                    <p>Thank you for contacting me. Your message has been received.</p>
                </div>

                <div class="flex mt-6 space-x-4">
                    <a href="{{ route('landing') }}" class="btn btn-success">Home</a>
                    <a href="{{ route('contact.form') }}" class="btn btn-error">Contact Me</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
