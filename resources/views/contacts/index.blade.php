@include('layouts1.app')

<div class="p-4 sm:ml-64">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="p-4 mt-6">
        <h2 class="text-4xl font-extrabold dark:text-white">Data contact</h2>
            

            <div class="relative overflow-x-auto mt-3 shadow-md">
                <table class="w-full text-sm text-left rtl:text-right text-white-500 text-white-400">
                    <thead class="text-xs text-white-700 uppercase bg-blue-50 dark:bg-blue-700 dark:text-White-400">
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
                                No Telp
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Massage
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $index => $contact)
                <tr class="bg-white border-b dark:bg-white-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-/* The above code appears to be a comment block in PHP. Comments in PHP are denoted by either `//` for single-line comments or `/* */` for multi-line comments. In this case, the code is using `/* */` to create a multi-line comment block. The content within the comment block is not valid PHP code and will not be executed by the PHP interpreter. */
                white">
                        <td class="py-4 px-6">{{ $index+1 }}</td>
                        <td class="py-4 px-6">{{ $contact->NamaPengirim }}</td>
                        <td class="py-4 px-6">{{ $contact->EmailPengirim }}</td>
                        <td class="py-4 px-6">{{ $contact->NoTelpPengirim }}</td>
                        <td class="py-4 px-6">{{ $contact->Massage }}</td>
                        <td class="py-4 px-6">
                        <div class="inline-flex rounded-md shadow-sm">
                            <a href="{{ route('contacts.edit', $contact->ID) }}" class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">Update</a>
                            <form action="{{ route('contacts.destroy', $contact->ID) }}" method="POST" style="display:inline-block;" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-red-600 hover:bg-red-600 dark:focus:ring-blue-500 dark:focus:text-white">
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