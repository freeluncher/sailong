@extends('layouts.guest')
@section('content')
    <div class="w-full flex justify-center items-center mt-16 md:mt-44 lg:mt-36">
        <form method="POST" action="{{ route('login') }}"
            class="bg-white shadow-md w-full px-20 pt-6 pb-8 mb-4 rounded lg:w-1/3 md:w-1/2">
            @csrf
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold">Login</h1>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input id="email" type="email" name="email"
                    class="shadow appearance-none border rounded w-full h-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required autofocus>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input id="password" type="password" name="password"
                    class="shadow appearance-none border rounded w-full h-1/2 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <div class="mb-6">
                <a href="{{ route('password.request') }}" class="text-gray-700 hover:text-gray-400">Forgot Password?</a>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Login
                </button>
                <a href="{{ route('register') }}"
                    class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Register
                </a>
            </div>
        </form>
    </div>
@endsection
