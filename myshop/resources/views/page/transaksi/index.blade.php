    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('PENJUALAN') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="gap-5 items-start flex">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                        <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                            <div class="flex items-center justify-between">
                                <div class="w-full ml-2">
                                    TRANSAKSI PENJUALAN
                                </div>
                                {{-- BUTTON REDIRECT HALAMAN ADD PENJUALAN --}}
                                <div>
                                    <a href="{{ route('transaksi.create') }}"
                                        class="bg-sky-400 p-1 text-white rounded-xl px-4">Tambah</a>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 text-gray-900 dark:text-gray-100 flex gap-5">
                            {{-- TABLE KONSINYASI PRODUK --}}
                            <div class="w-full">
                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table
                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                                                @can('role-admin')
                                                    <th scope="col" class="px-6 py-3">
                                                    </th>
                                                @endcan
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
                                                    @can('role-admin')
                                                        <td class="px-6 py-4">
                                                            <button type="button" data-id="{{ $t->id }}"
                                                                onclick="confirmUpdate('{{ $t->id }}', '{{ $t->dibayar }}', '{{ $t->kode_invoice }}')"
                                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                                Update
                                                            </button>
                                                            <button
                                                                onclick="return transaksiDelete('{{ $t->id }}','{{ $t->kode_invoice }}')"
                                                                class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
                                                        </td>
                                                    @endcan
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
        </div>
    </x-app-layout>


    @if (Session::has('message'))
        <script>
            swal("Message", "{{ Session::get('message') }}", "success", {
                button: "oke",
                timer: 3000,
            });
        </script>
    @elseif (Session::has('message_update'))
        <script>
            swal("Message", "{{ Session::get('message_update') }}", "success", {
                button: "oke",
                timer: 3000,
            });
        </script>
    @endif


    <script>
        const confirmUpdate = (id, dibayar,kode_invoice) => {
            if (dibayar === "belum dibayar") {
                swal({
                    title: "Konfirmasi",
                    text: `Apakah Anda yakin ingin mengubah status pembayaran menjadi 'dibayar' pada kode_invoice ${kode_invoice} ?`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willUpdate) => {
                    if (willUpdate) {
                        updateTransaksi(id);
                    } 
                });
            } else {
                swal("Status sudah 'dibayar', tidak perlu diupdate.");
            }
        };

        const updateTransaksi = async (id) => {
            try {
                const response = await axios.patch(`/transaksi/${id}`, {
                    dibayar: 'dibayar', 
                    _token: $('meta[name="csrf-token"]').attr('content') 
                });

                if (response.data.success) {
                    swal("Message", response.data.message, "success", {
                        button: "oke",
                    }).then(() => {
                        location.reload(); 
                    });
                } else {
                    swal("Message", response.data.message, "error", {
                        button: "oke",
                    });
                }
            } catch (error) {
                swal("Message", "Gagal mereload status pembayaran!", "error", {
                    button: "oke",
                });
            }
        };
    </script>
    <script>
        const transaksiDelete = async (id, kode_invoice) => {
            swal({
                title: "Konfirmasi",
                text: `Apakah anda yakin untuk menghapus Transaksi yang KODE INVOICE ${kode_invoice} ?`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then(async (willDelete) => {
                if (willDelete) {
                    try {
                        await axios.post(`/transaksi/${id}`, {
                            '_method': 'DELETE',
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        });
                        swal("Message", "Data berhasil dihapus!", "success", {
                            button: "oke",
                        }).then(() => {
                            location.reload(); 
                        });
                    } catch (error) {
                        swal("Message", "Data gagal dihapus!", "error", {
                            button: "oke",
                        });
                    }
                } 
            });
        }
    </script>
