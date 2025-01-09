@extends('master')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-6">Role Permissions</h1>
        @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
        @endif
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Role</th>
                    <th class="border border-gray-300 px-4 py-2">Permissions</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $role->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $role->permissions->pluck('name')->join(', ') ?: 'No Permissions' }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('role-permissions.edit', $role->id) }}" class="text-blue-500">Edit
                                Permissions</a>
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
