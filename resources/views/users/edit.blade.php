@extends('master')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Edit User: {{ $user->name }}</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-4">
            <div>
                <label for="name" class="block">Name</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $user->name }}" required>
            </div>
            <div>
                <label for="email" class="block">Email</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $user->email }}" required>
            </div>
            <div>
                <label for="password" class="block">Password (Leave blank to keep current password)</label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded px-4 py-2">
            </div>
            <div>
                <label for="role" class="block">Role</label>
                <select name="role" id="role" class="w-full border border-gray-300 rounded px-4 py-2" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Update User</button>
        </div>
    </form>
</div>
@endsection
