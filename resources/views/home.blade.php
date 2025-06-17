@extends('layout')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen p-4">
    <!-- Welcome Message Box -->
    <div class="bg-indigo-50 border border-indigo-100 rounded-lg p-6 max-w-md w-full shadow-sm mb-8">
        <h1 class="text-2xl font-bold text-indigo-800 mb-3">Welcome to my App</h1>
        <p class="text-indigo-600">
            Hey, it's working! This is a fun project I made to learn Laravel. Hope you like it!
        </p>
    </div>

    <!-- Logout Button -->
    <form action="{{ route('authentication.logout') }}" method="POST">
        @csrf
        <button type="submit" 
                class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-6 rounded-lg transition duration-200 shadow">
            Logout
        </button>
    </form>
</div>
@endsection