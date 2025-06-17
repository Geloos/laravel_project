@extends('layout')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen p-4">
    <!-- Welcome Message Box -->
    <div class="bg-indigo-50 border border-indigo-100 rounded-lg p-6 max-w-md w-full shadow-sm mb-8">
        <h1 class="text-2xl font-bold text-indigo-800 mb-3">Welcome to my App</h1>
        <p class="text-indigo-600 mb-4">
            Hey, it's working! This is a fun project I made to learn Laravel. Hope you like it!
        </p>
        
        <!-- Add Goal Setting Form Here -->
        <div class="mt-4">
            <form method="POST" action="{{ route('authentication.setgoal') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="goal" class="block text-sm font-medium text-indigo-700">Set Your Savings Goal</label>
                    <input type="number" id="goal" name="goal" 
                           placeholder="Enter amount (e.g., 1000)" 
                           class="mt-1 block w-full px-3 py-2 border border-indigo-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                           value="{{ old('goal', $goal ?? '') }}">
                    @error('goal')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Set Goal
                </button>
            </form>
        </div>
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