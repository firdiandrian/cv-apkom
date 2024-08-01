@include('layouts.app')


<header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="p-4 mt-6">
                
                <h2 class="text-4xl font-extrabold dark:text-Black">Market Place</h2>
                <a href="/orders/create/" class="block mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 23" fill="currentColor" class="w-3.5 h-3.5 me-2">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 00 1.5v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                    </svg>
                    Pembelian
                </a>
                <div class="relative overflow-x-auto mt-3 shadow-md">
                    <table class="w-full text-sm text-left rtl:text-right text-white-500 text-white-400">
                        <thead class="text-xs text-white-700 uppercase bg-blue-50 dark:bg-blue-700 dark:text-white-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Foto Barang
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Barang
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Stok
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $index => $barang)
                                <tr class="bg-white border-b dark:bg-white-800 dark:border-white-700">
                                    <td class="py-4 px-6">{{ $index+1 }}</td>
                                    <td class="py-4 px-6">
                                        @if ($barang->Foto)
                                            <img src="{{ asset('images/'.$barang->Foto) }}" alt="{{ $barang->NamaBarang }}" width="50">
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">{{ $barang->NamaBarang }}</td>
                                    <td class="py-4 px-6">{{ $barang->Stok  }} Buah</td>
                                    <td class="py-4 px-6">Rp.{{number_format ($barang->Harga) }}</td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </header>

    @extends('layouts.foot')

</body>
</html>