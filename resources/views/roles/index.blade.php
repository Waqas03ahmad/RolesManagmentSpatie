@extends('master')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-6">Roles</h1>
        <a href="{{ route('roles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Role</a>
        @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
        @endif
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $role->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $role->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('roles.edit', $role->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $roles->links() }}
        </div>
    </div>
@endsection
