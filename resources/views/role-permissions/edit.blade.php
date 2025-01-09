@extends('master')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Edit Permissions for Role: {{ $role->name }}</h1>
    <form action="{{ route('role-permissions.update', $role->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="permissions" class="block text-sm font-medium">Permissions</label>
            <div class="grid grid-cols-3 gap-4">
                @foreach ($permissions as $permission)
                <div>
                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" 
                           id="permission-{{ $permission->id }}" 
                           {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}>
                    <label for="permission-{{ $permission->id }}" class="ml-2">{{ $permission->name }}</label>
                </div>
                @endforeach
            </div>
            @error('permissions')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Changes</button>
    </form>
</div>
@endsection
