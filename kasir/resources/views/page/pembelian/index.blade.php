<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pembelian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-red-500 p-4 rounded-xl mb-2 flex items-center justify-between">
                        <div>Data Pembelian</div>
                        <div><a href="{{ route('pembelian.create') }}" class="bg-sky-400 p-1">Tambah</a></div>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        SUPPLIER
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        TANGGAL
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;

                                @endphp
                                @foreach ($pembelian as $p)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $p->supplier->supplier }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $p->tgl_pembelian }}
                                        </td>
                                        <td class="px-6 py-4">
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $pembelian->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
