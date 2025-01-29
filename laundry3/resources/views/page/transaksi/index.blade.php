<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 items-ce">
                    <div>DATA TRANSAKSI</div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 flex gap-5">
                    {{-- FORM ADD --}}
                    <div class="w-full bg-gray-100 p-4 rounded-xl">
                        <div class="mb-5">
                            INPUT DATA TRANSAKSI
                        </div>
                        <form action="{{ route('transaksi.store') }}" method="post">
                            @csrf
                            {{-- <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id Outlet</label>
                                <input name="id_outlet" type="number" id="base-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Id Outlet disini...">
                            </div> --}}
                            <div class="mb-5">
                                <label for="id_outlet"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id
                                    Outlet</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="id_outlet" data-placeholder="Pilih Konsinyasi">
                                    <option value="">Pilih...</option>
                                    @foreach ($outlet as $o)
                                        <option value="{{ $o->id }}">{{ $o->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="kode_invoice"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                    Invoice</label>
                                <input name="kode_invoice" type="text" id="kode_invoice"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Nama transaksi disini...">
                            </div>
                            <div class="mb-5">
                                <label for="member"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Member</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="member" data-placeholder="Pilih Member">
                                    <option value="">Pilih...</option>
                                    @foreach ($member as $m)
                                        <option value="{{ $m->id }}">{{ $m->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="tanggal"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                <input name="tanggal" type="date" id="tanggal"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Nama transaksi disini...">
                            </div>
                            <div class="mb-5">
                                <label for="batas_waktu"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batas
                                    Waktu</label>
                                <input name="batas_waktu" type="datetime" id="batas_waktu"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Nama transaksi disini...">
                            </div>
                            <div class="mb-5">
                                <label for="tgl_bayar"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Bayar</label>
                                <input name="tgl_bayar" type="datetime" id="tgl_bayar"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Nama transaksi disini...">
                            </div>
                            <div class="mb-5">
                                <label for="biaya_tambahan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                    Tambahan</label>
                                <input name="biaya_tambahan" type="number" id="biaya_tambahan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Nama transaksi disini...">
                            </div>
                            <div class="mb-5">
                                <label for="diskon"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diskon</label>
                                <input name="diskon" type="number" id="diskon"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Nama transaksi disini...">
                            </div>
                            <div class="mb-5">
                                <label for="pajak"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pajak</label>
                                <input name="pajak" type="number" id="pajak"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Nama transaksi disini...">
                            </div>
                            <div class="mb-5">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <input name="status" type="text" id="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Nama transaksi disini...">
                            </div>
                            <div class="mb-5">
                                <label for="dibayar"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">dibayar</label>
                                <input name="dibayar" type="text" id="dibayar"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Nama transaksi disini...">
                            </div>
                            <div class="mb-5">
                                <label for="id_user"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="id_user" data-placeholder="Pilih id_user">
                                    <option value="">Pilih...</option>
                                    @foreach ($user as $u)
                                        <option value="{{ $u->id }}">{{ $u->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">SIMPAN</button>
                        </form>
                    </div>
                    {{-- TABLE KONSINYASI PRODUK --}}
                    <div class="w-full">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            OUTLET
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kode Invoice
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Member
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tanggal
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Batas Waktu
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tanggal Bayar
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Biaya Tambahan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Diskon
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Pajak
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Dibayar
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            User
                                        </th>
                                        <th scope="col" class="px-6 py-3">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($transaksi as $key => $t)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $transaksi->perPage() * ($transaksi->currentPage() - 1) + $key + 1 }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $t->Outlet->nama }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $t->kode_invoice }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $t->member->nama }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $t->tanggal }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $t->batas_waktu }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $t->tgl_bayar }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $t->biaya_tambahan }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $t->diskon }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $t->pajak }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $t->status }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $t->dibayar }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $t->user->nama }}
                                            </td>
                                            <td class="px-6 py-4">

                                            </td>
                                            <td class="px-6 py-4">
                                                <button type="button" data-id="{{ $t->id }}"
                                                    data-modal-target="sourceModal"
                                                    data-id_outlet="{{ $t->id_outlet }}"
                                                    data-kode_invoice="{{ $t->kode_invoice }}"
                                                    data-id_member="{{ $t->id_member }}"
                                                    data-tanggal="{{ $t->tanggal }}"
                                                    data-batas_waktu="{{ $t->batas_waktu }}"
                                                    data-tgl_bayar="{{ $t->tgl_bayar }}"
                                                    data-biaya_tambahan="{{ $t->biaya_tambahan }}"
                                                    data-diskon="{{ $t->diskon }}"
                                                    data-pajak="{{ $t->pajak }}"
                                                    data-status="{{ $t->status }}"
                                                    data-dibayar="{{ $t->dibayar }}"
                                                    data-id_user="{{ $t->id_user }}"
                                                    data-nama_transaksi="{{ $t->nama_transaksi }}"
                                                    onclick="editSourceModal(this)"
                                                    class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                    Edit
                                                </button>
                                                <button
                                                    onclick="return transaksiDelete('{{ $t->id }}','{{ $t->outlet->nama }}')"
                                                    class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $transaksi->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Update Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col  p-4 space-y-6">
                        <div class="mb-5">
                            <label for="id_outlet"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id Outlet</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="id_outlet" data-placeholder="Pilih Konsinyasi">
                                <option value="">Pilih...</option>
                                @foreach ($outlet as $o)
                                    <option value="{{ $o->id }}">{{ $o->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="kode_invoice"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                Invoice</label>
                            <input name="kode_invoice" type="text" id="kode_invoice"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama transaksi disini...">
                        </div>
                        <div class="mb-5">
                            <label for="member"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Member</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="member" data-placeholder="Pilih Member">
                                <option value="">Pilih...</option>
                                @foreach ($member as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="tanggal"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                            <input name="tanggal" type="date" id="tanggal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama transaksi disini...">
                        </div>
                        <div class="mb-5">
                            <label for="batas_waktu"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batas
                                Waktu</label>
                            <input name="batas_waktu" type="datetime" id="batas_waktu"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama transaksi disini...">
                        </div>
                        <div class="mb-5">
                            <label for="tgl_bayar"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Bayar</label>
                            <input name="tgl_bayar" type="datetime" id="tgl_bayar"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama transaksi disini...">
                        </div>
                        <div class="mb-5">
                            <label for="biaya_tambahan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                Tambahan</label>
                            <input name="biaya_tambahan" type="number" id="biaya_tambahan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama transaksi disini...">
                        </div>
                        <div class="mb-5">
                            <label for="diskon"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diskon</label>
                            <input name="diskon" type="number" id="diskon"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama transaksi disini...">
                        </div>
                        <div class="mb-5">
                            <label for="pajak"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pajak</label>
                            <input name="pajak" type="number" id="pajak"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama transaksi disini...">
                        </div>
                        <div class="mb-5">
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <input name="status" type="text" id="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama transaksi disini...">
                        </div>
                        <div class="mb-5">
                            <label for="dibayar"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">dibayar</label>
                            <input name="dibayar" type="text" id="dibayar"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama transaksi disini...">
                        </div>
                        <div class="mb-5">
                            <label for="id_user"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="id_user" data-placeholder="Pilih id_user">
                                <option value="">Pilih...</option>
                                @foreach ($user as $u)
                                    <option value="{{ $u->id }}">{{ $u->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="">
                            <label for="id_outlet_edit"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Outlet</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="id_outlet_edit" data-placeholder="Pilih Produk">
                                <option value="">Pilih...</option>
                                @foreach ($outlet as $o)
                                    <option value="{{ $o->id }}">{{ $o->nama }}</option>                                        
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Jenis</label>
                            <input type="text" id="jenis" name="jenis"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Jenis disini...">
                        </div>
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nama transaksi</label>
                            <input type="text" id="nama_transaksi" name="nama_transaksi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama transaksi disini...">
                        </div> --}}
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const id_outlet = button.dataset.id_outlet;
        const kode_invoice = button.dataset.kode_invoice;
        const id_member = button.dataset.id_member;
        const tanggal = button.dataset.tanggal;
        const batas_waktu = button.dataset.batas_waktu;
        const tgl_bayar = button.dataset.tgl_bayar;
        const biaya_tambahan = button.dataset.biaya_tambahan;
        const diskon = button.dataset.diskon;
        const pajak = button.dataset.pajak;
        const status = button.dataset.status;
        const dibayar = button.dataset.dibayar;
        const id_user = button.dataset.id_user;

        let url = "{{ route('transaksi.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `UPDATE transaksi ${nama_transaksi}`;

        // document.getElementById('id_outlet').value = id_outlet;
        let event = new Event('change');

        document.querySelector('[name="id_outlet_edit"]').value = id_outlet;
        document.querySelector('[name="id_outlet_edit"]').dispatchEvent(event);
        document.querySelector('[name="id_member"]').value = id_member;
        document.querySelector('[name="id_member"]').dispatchEvent(event);
        document.querySelector('[name="id_user"]').value = id_user;
        document.querySelector('[name="id_user"]').dispatchEvent(event);

        document.getElementById('kode_invoice').value = kode_invoice;
        document.getElementById('tanggal').value = tanggal;
        document.getElementById('batas_waktu').value = batas_waktu;
        document.getElementById('tgl_bayar').value = tgl_bayar;
        document.getElementById('biaya_tambahan').value = biaya_tambahan;
        document.getElementById('diskon').value = diskon;
        document.getElementById('pajak').value = pajak;
        document.getElementById('status').value = status;
        document.getElementById('dibayar').value = dibayar;

        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);
        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        formModal.appendChild(csrfToken);

        let methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PATCH');
        formModal.appendChild(methodInput);

        status.classList.toggle('hidden');
    }

    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let status = document.getElementById(modalTarget);
        status.classList.toggle('hidden');
    }

    const transaksiDelete = async (id, outlet) => {
        let tanya = confirm(`Apakah anda yakin untuk menghapus transaksi ${outlet} ?`);
        if (tanya) {
            await axios.post(`/transaksi/${id}`, {
                    '_method': 'DELETE',
                    '_token': $('meta[name="csrf-token"]').attr('content')
                })
                .then(function(response) {
                    // Handle success
                    location.reload();
                })
                .catch(function(error) {
                    // Handle error
                    alert('Error deleting record');
                    console.log(error);
                });
        }
    }
</script>
