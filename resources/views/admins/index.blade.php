@include('layouts1.app')

<div class="p-4 sm:ml-64">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="p-4 mt-6">
        <h2 class="text-4xl font-extrabold dark:text-white">Data Admin</h2>
            <a href="../admins/create" class="block mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-mediumrounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 23"fill="currentColor" class="w-3.5 h-3.5 me-2">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 122.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 00 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" /></svg>Tambah
            </a>

            <div class="relative overflow-x-auto mt-3 shadow-md">
                <table class="w-full text-sm text-left rtl:text-right text-white-500 text-white-400">
                    <thead class="text-xs text-white-700 uppercase bg-blue-50 dark:bg-blue-700 dark:text-white-400">
                        <tr>
                        <th scope="col" class="px-6 py-3">
                                
                            </th>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Password
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $index => $admin)
                <tr class="bg-white border-b dark:bg-white-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-/* The above code appears to be a comment block in PHP. Comments in PHP are denoted by either `//` for single-line comments or `/* */` for multi-line comments. In this case, the code is using `/* */` to create a multi-line comment block. The content within the comment block is not valid PHP code and will not be executed by the PHP interpreter. */
                white">
                        <td class="py-4 px-6">{{ $index+1 }}</td>
                        <td class="py-4 px-6">{{ $admin->Nama }}</td>
                        <td class="py-4 px-6">{{ $admin->Email }}</td>
                        <td class="py-4 px-6">{{ $admin->Password }}</td>
                        <td class="py-4 px-6">
                        <div class="inline-flex rounded-md shadow-sm">
                            <a href="{{ route('admins.edit', $admin->ID) }}" class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">Update</a>
                            <form action="{{ route('admins.destroy', $admin->ID) }}" method="POST" style="display:inline-block;" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-red-600 hover:bg-red-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                            </div>
                        </td>
</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
  </header>
</body>
</html>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admins List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <h1 class="text-3xl font-bold mb-6">Admins List</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-blue-100 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Nama</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Password</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr class="border-b border-gray-200 text-sm">
                        <td class="py-3 px-6">{{ $admin->ID }}</td>
                        <td class="py-3 px-6">{{ $admin->Nama }}</td>
                        <td class="py-3 px-6">{{ $admin->Email }}</td>
                        <td class="py-3 px-6">{{ $admin->Password }}</td>
                        <td class="py-3 px-6">
                            <a href="{{ route('admins.edit', $admin->ID) }}" class="text-blue-600 hover:text-blue-900 mr-2">Update</a>
                            <form action="{{ route('admins.destroy', $admin->ID) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html> -->