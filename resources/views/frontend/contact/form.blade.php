<!-- resources/views/contact/form.blade.php -->
@extends('frontend.layouts.app')
@section('title')
    KONTAK KAMI
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <section class="p-6 dark:text-gray-100">
                <form method="POST" action="{{ route('contact.submit') }}"
                    class="container w-full max-w-xl p-8 mx-auto space-y-6 rounded-md shadow dark:bg-gray-900">
                    @csrf
                    <h2 class="w-full text-4xl font-bold justify-center">{{ __('Kontak Kami') }}</h2>
                    <div>
                        <label for="name" class="block mb-1 ml-1">{{ __('Name') }}</label>
                        <input id="name" type="text" placeholder="Your name"
                            class="block w-full p-2 rounded focus:outline-none focus:ring focus:ri focus:ri dark:bg-gray-800 @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name">
                        @error('name')
                            <div class="text-red-600 mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-1 ml-1">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" placeholder="Your email"
                            class="block w-full p-2 rounded focus:outline-none focus:ring focus:ri focus:ri dark:bg-gray-800 @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="block mb-1 ml-1">{{ __('Phone') }}</label>
                        <input id="phone" type="phone" placeholder="Your phone"
                            class="block w-full p-2 rounded focus:outline-none focus:ring focus:ri focus:ri dark:bg-gray-800 @error('phone') is-invalid @enderror"
                            name="phone" value="{{ old('phone') }}" autocomplete="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="message" class="block mb-1 ml-1">{{ __('Message') }}</label>
                        <textarea id="message" type="text" placeholder="Message..."
                            class="block w-full p-2 rounded autoexpand focus:outline-none focus:ring focus:ri focus:ri dark:bg-gray-800 @error('message') is-invalid @enderror"
                            name="message" required>{{ old('message') }}</textarea>
                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="btn btn-success w-full px-4 py-2 font-bold rounded shadow focus:outline-none focus:ring hover:ring focus:ri  focus:ri hover:ri dark:text-gray-900">{{ __('Submit') }}</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
