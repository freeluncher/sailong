@extends('layouts.guest')
@section('content')
    <div class="w-full flex justify-center items-center mt-16 md:mt-44 lg:mt-36">
        <form method="POST" action="{{ route('password.email') }}"
            class="bg-white shadow-md w-full px-20 pt-6 pb-8 mb-4 rounded lg:w-1/3 md:w-1/2">
            @csrf
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold">Forgot Password</h1>
            </div>
            <div>
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" id="email" name="email"
                    class="shadow appearance-none border rounded w-full h-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <div class="mt-4">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Send
                    Password
                    Reset Link</button>
            </div>
        </form>
    </div>
    </div>
@endsection
