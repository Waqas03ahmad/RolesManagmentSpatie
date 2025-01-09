@extends('master')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-6">Edit Role</h1>
        <form action="{{ route('roles.update', $role->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" name="name" id="name" value="{{ $role->name }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
@endsection
