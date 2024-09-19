<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include Tailwind CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="min-h-screen flex flex-col items-center bg-gray-100">
        <div class="w-full max-w-6xl">
            <div class="bg-white shadow-md rounded p-6 mt-8 border border-gray-300">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">All Users</h2>
                    <a href="/users/create"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create New User
                    </a>
                </div>

                <!-- Display all users -->
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-300">
                            <th class="py-2 px-4 border-r border-gray-300">#</th>
                            <th class="py-2 px-4 border-r border-gray-300">Name</th>
                            <th class="py-2 px-4 border-r border-gray-300">Role</th>
                            <th class="py-2 px-4 border-r border-gray-300">Email</th>
                            <th class="py-2 px-4 border-r border-gray-300">Permissions</th>
                            <th class="py-2 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr class="border-b border-gray-300 text-center">
                                <td class="py-2 px-4 border-r border-gray-300">{{ $user->id }}</td>
                                <td class="py-2 px-4 border-r border-gray-300">{{ $user->name }}</td>
                                <td class="py-2 px-4 border-r border-gray-300">
                                    {{ $user->roles[0]->name }}</td>
                                <td class="py-2 px-4 border-r border-gray-300">{{ $user->email }}</td>
                                <td class="py-2 px-4 border-r border-gray-300">
                                    <i data-bs-toggle="modal" data-bs-target="#modal{{ $key }}"
                                        class="fas fa-clock text-yellow-300 clock-icon"></i>
                                </td>

                                <td class="py-2 px-4 flex space-x-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Modal HTML -->
                            {{-- <div id="modal{{ $key }}"
                                class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center z-50">
                                <div class="bg-white p-6 rounded shadow-lg w-1/2 max-w-md">
                                    <h2 class="text-xl font-bold mb-4">Permissions</h2>
                                    @foreach ($permissions as $permission)
                                        @if ($user->roles[0]->permissions->contains($permission->id))
                                            <p>{{ $permission->name }}</p>
                                        @endif
                                    @endforeach
                                    <a id="close-btn" onclick="closeModal()" data-bs-dismiss="modal"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Close
                                    </a>
                                </div>
                            </div> --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function closeModal() {
            var myModal = document.getElementById('modal');
            myModal.hide();
        }
    </script>
</body>

</html>
