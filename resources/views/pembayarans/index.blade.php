@include('layouts1.app')


<div class="p-4 sm:ml-64">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="p-4 mt-6">
                <h2 class="text-4xl font-extrabold dark:text-white">Data Pembayaran</h2>

                <div class="relative overflow-x-auto mt-3 shadow-md">
                    <table class="w-full text-sm text-left rtl:text-right text-white-500 text-white-400">
                        <thead class="text-xs text-white-700 uppercase bg-blue-50 dark:bg-blue-700 dark:text-white-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Barang
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Bukti Pembayaran
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Konfirmasi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayarans as $index => $pembayaran)
                                <tr class="bg-white border-b dark:bg-white-800 dark:border-white-700">
                                    <td class="py-4 px-4">{{ $index+1 }}</td>
                                    <td class="py-4 px-6">{{ $pembayaran->orders->barangs->NamaBarang}}</td>
                                    <td class="py-4 px-6">
                                    @if ($pembayaran->Bukti)
                                            <img src="{{ asset('images/'.$pembayaran->Bukti) }}" width="50">
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">{{ $pembayaran->Konfirmasi }}</td>
                                    <td class="py-4 px-6">
                                        <div class="inline-flex rounded-md shadow-sm">
                                        <a href="{{ route('pembayarans.edit', $pembayaran->id) }}" class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">Update</a>
                                            <form action="{{ route('pembayarans.destroy', $pembayaran->id) }}" method="POST" style="display:inline-block;" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-red-600 hover:bg-red-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </header>
</body>
</html>