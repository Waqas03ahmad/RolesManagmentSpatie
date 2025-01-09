<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">My Responsive App</h1>
            <nav class="space-x-4">
               nothing special 
            </nav>
        </div>
    </header>

    <!-- Main Layout -->
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar (Hidden on mobile) -->
        <aside class="bg-blue-700 text-white w-full md:w-1/4 lg:w-1/5 hidden md:block">
            <div class="p-4 space-y-4">
                <a href="{{ route('permissions.index') }}"
                    class="block py-2 px-4 hover:bg-blue-600 rounded">Permissions</a>
                <a href="{{ route('roles.index') }}" class="block py-2 px-4 hover:bg-blue-600 rounded">Roles</a>
                <a href="{{ route('role-permissions.index') }}" class="block py-2 px-4 hover:bg-blue-600 rounded">Assign</a>
                <a href="{{ route('users.index') }}" class="block py-2 px-4 hover:bg-blue-600 rounded">Users</a>
                <a href="#" class="block py-2 px-4 hover:bg-blue-600 rounded">Reports</a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

</body>

</html>
