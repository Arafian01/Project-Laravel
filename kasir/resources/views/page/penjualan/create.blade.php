<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Penjualan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="w-full  mx-auto" method="POST" action="{{ route('penjualan.store') }}">
                        @csrf
                        <div class="mb-5">
                            <label for="id_konsumen"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konsumen</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                id="id_konsumen" name="id_konsumen" data-placeholder="Pilih Konsumen">
                                <option value="">Pilih...</option>
                                @foreach ($konsumen as $k)
                                    <option value="{{ $k->id }}">{{ $k->konsumen }}</option>                                        
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="tgl_penjualan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Penjualan</label>
                            <input type="date" id="tgl_penjualan" name="tgl_penjualan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="status_pembelian"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Pembelian</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                id="status_pembelian" name="status_pembelian" data-placeholder="Pilih Status Pembelian">
                                <option value="">Pilih...</option>
                                <option value="LUNAS">LUNAS</option>
                                <option value="PIUTANG">PIUTANG</option>
                            </select>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
