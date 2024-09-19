<!-- resources/views/users/create.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <!-- Include Tailwind CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="min-h-screen flex justify-center items-center bg-gray-100">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border border-gray-300">
                <h2 class="text-center text-2xl font-bold mb-6">Create New User</h2>

                <!-- Display validation errors -->
                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/users/create" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-bold mb-2">Name:</label>
                        <input type="text" name="name" id="name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required autofocus>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-bold mb-2">Email:</label>
                        <input type="email" name="email" id="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-bold mb-2">Password:</label>
                        <input type="password" name="password" id="password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-sm font-bold mb-2">Role:</label>
                        <select name="role" id="role"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                            <option value="" disabled selected>Select a role</option>
                            <option value="Manager">Manager</option>
                            <option value="Developer">Developer</option>
                            <option value="Viewer">Viewer</option>
                        </select>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Create User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
