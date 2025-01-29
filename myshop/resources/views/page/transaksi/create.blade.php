<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full">
                                FORM INPUT TRANSAKSI
                            </div>
                        </div>
                    </div>
                    {{-- FORM INPUT PENJUALAN --}}
                    <div>
                        <form class="w-full mx-auto" method="POST" action="{{ route('transaksi.store') }}">
                            @csrf
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="kode_invoice"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                        Invoice</label>
                                    <input type="text" id="kode_invoice" name="kode_invoice"
                                        value="{{ $kodeInovice }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Kode Penjualan" readonly required />
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="id_outlet"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Outlet</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                        id="id_outlet" name="id_outlet" data-placeholder="Pilih Outlet" required>
                                        <option value="">Pilih...</option>
                                        @foreach ($outlet as $o)
                                            <option value="{{ $o->id }}">
                                                {{ $o->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="tgl"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                    <input type="date" id="tgl" name="tgl" value="{{ date('Y-m-d') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="batas_waktu"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batas
                                        Waktu</label>
                                    <input type="date" id="batas_waktu" name="batas_waktu"
                                        value="{{ date('Y-m-d') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                            </div>

                            <div class="flex gap-5">
                                <div id="status-pembelian-container" class="mb-5 w-full">
                                    <label for="status"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                        id="status" name="status" data-placeholder="Pilih Status Pembelian"
                                        required>
                                        <option value="">Pilih...</option>
                                        <option value="BARU">BARU</option>
                                        <option value="PROSES">PROSES</option>
                                        <option value="SELESAI">SELESAI</option>
                                        <option value="DIAMBIL">DIAMBIL</option>
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="id_member"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Member</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                        id="id_member" name="id_member" data-placeholder="Pilih Member" required>
                                        <option value="">Pilih...</option>
                                        @foreach ($member as $m)
                                            <option value="{{ $m->id }}">
                                                {{ $m->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- DETAIL PENJUALAN PAKET --}}
                            <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                                <div class="flex items-center justify-between">
                                    <div class="w-full">
                                        DETAIL TRANSAKSI PAKET
                                    </div>
                                    <div><button id="addRowBtn"
                                            class="bg-sky-400 hover:bg-sky-500 text-white px-2 rounded-xl">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="border-2 rounded-xl p-2 mb-2" id="PaketContainer">
                                </div>
                            </div>
                            {{-- ======================= --}}
                            <div class="gap-5 flex">
                                <div class="mb-5 w-full">
                                    <label for="total_jual"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total</label>
                                    <input type="number" id="total_jual" name="total_jual" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        readonly />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="biaya_tambahan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                        Tambahan</label>
                                    <input type="number" id="biaya_tambahan" name="biaya_tambahan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Biaya Tambahan" />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="diskon"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diskon</label>
                                    <div class="flex">
                                        <input type="number" id="diskon"
                                            class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            name="diskon" value="0" required>
                                        <span
                                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-gray-300 border-s-0 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                            %
                                        </span>
                                    </div>
                                </div>


                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="pajak"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pajak</label>
                                    <input type="number" id="pajak" name="pajak"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        readonly required />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="total_bayar"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                        Bayar</label>
                                    <input type="number" id="total_bayar" name="total_bayar"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                        readonly required />
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                    {{-- =================== --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            function calculateTotalBayar() {
                const totalHarga = parseFloat($('#total_jual').val()) || 0;
                const biayaTambahan = parseFloat($('#biaya_tambahan').val()) || 0;
                const diskon = parseFloat($('#diskon').val()) || 0;
                const pajak = parseFloat($('#pajak').val()) || 0;
                const totalBayar = totalHarga - (totalHarga * (diskon / 100)) + biayaTambahan + pajak;
                $('#total_bayar').val(totalBayar);
            }

            // Event listener untuk total_bayar
            $('#biaya_tambahan').on('input', function() {
                calculateTotalBayar();
            });

            $('#diskon').on('input', function() {
                const diskon = $(this).val();
                if (diskon >= 0 && diskon <= 100) { // Menggunakan && untuk memeriksa rentang
                    calculateTotalBayar();
                } else {
                    swal("Message", "Masukan Nilai Diskon yang valid!!", "warning", {
                        button: "oke",
                        timer: 3000,
                    }).then(() => {
                        $('#diskon ').val(0);
                    });
                }
            });

            $('#addRowBtn').hide();

            // Event listener untuk combobox outlet
            $('#id_outlet').on('change', function() {
                const selectedOutletId = $(this).val();

                if (selectedOutletId) {
                    $('#addRowBtn').show(); // Tampilkan tombol jika outlet dipilih
                } else {
                    $('#addRowBtn').hide(); // Sembunyikan tombol jika tidak ada outlet yang dipilih
                }
                filterPaketByOutlet(selectedOutletId);
            });

            function filterPaketByOutlet(outletId) {
                $('[id^="paket"]').each(function() {
                    const paketSelect = $(this);
                    paketSelect.find('option').each(function() {
                        const option = $(this);
                        const optionOutletId = selectedOption ? selectedOption.getAttribute(
                            'data-id-outlet') : null;
                        console.log(optionOutletId);

                        if (optionOutletId == outletId) {
                            option.show();
                        } else {
                            option.hide();
                        }
                    });

                    if (paketSelect.val() && paketSelect.find(`option[value="${paketSelect.val()}"]`).is(
                            ':hidden')) {
                        paketSelect.val('');
                    }
                });
            }

            // MENAMBAH ROW DETAIL PAKET PENJUALAN
            $('#addRowBtn').on('click', function(event) {
                event.preventDefault();
                addRow();
            });

            let rowCount = 0;

            function addRow() {
                rowCount++;
                const newRow = `<div class="border border-2 rounded-xl mb-2 p-2" id="row${rowCount}">
                                <div class="flex mb-2 gap-2">
                                    <div class="mb-5 w-full">
                                        <label for="paket${rowCount}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Paket</label>
                                        <select id="paket${rowCount}" name="paket[]" class="form-control w-full"
                                            onchange="getPaket(${rowCount})">
                                            <option value="">Pilih...</option>
                                            @foreach ($paket as $p)
                                                <option value="{{ $p->id }}" data-id-outlet="{{ $p->id_outlet }}">{{ $p->nama_paket }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="
                                        ${rowCount}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                        <input type="number" id="harga${rowCount}" name="harga[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly />
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="qty${rowCount}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qty</label>
                                        <input type="number" id="qty${rowCount}" name="qty[]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required value="0"/>
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="total_harga${rowCount}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Harga</label>
                                        <input type="number" id="total_harga${rowCount}" name="total_harga[]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required readonly/>
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="keterangan${rowCount}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                        <input type="text" id="keterangan${rowCount}" name="keterangan[]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            />
                                    </div>
                                    <button type="button" class="px-2 bg-red-100" onclick="removeRow(${rowCount})">
                                        Hapus
                                    </button>
                                </div>
                            </div>`;
                $('#PaketContainer').append(newRow);
                $(`#paket${rowCount}`).select2({
                    placeholder: "Pilih Paket"
                });

                // tambahin ini
                bindRowEvents(rowCount);
            }

            function bindRowEvents(rowId) {
                const hargaInput = document.getElementById(`harga${rowId}`);
                const qtyInput = document.getElementById(`qty${rowId}`);
                const totalHargaInput = document.getElementById(`total_harga${rowId}`);
                const keteranganInput = document.getElementById(`keterangan${rowId}`);

                // Perhitungan total harga
                const calculateTotalHarga = () => {
                    const harga = parseFloat(hargaInput.value) || 0;
                    const qty = parseInt(qtyInput.value) || 0;
                    totalHargaInput.value = harga * qty;

                    //MENGHITUNG TOTAL JUAL
                    calculateTotalJual();
                    calculateTotalBayar();
                };
                qtyInput.addEventListener("input", calculateTotalHarga);
            }

            //PERHITUNGAN TOTAL JUAL
            function calculateTotalJual() {
                let totalJual = 0;
                let pajak = 0;
                $("[id^='total_harga']").each(function() {
                    totalJual += parseFloat($(this).val()) || 0;
                    pajak = totalJual * (12 / 100);
                });
                $('#total_jual').val(totalJual);
                $('#pajak').val(pajak);
            }
        });

        // MENGHAPUS ROW DETAIL PAKET PENJUALAN
        function removeRow(rowId) {
            $(`#row${rowId}`).remove();
            updateRowNumbers();
        }
    </script>

    <script>
        const getPaket = (rowCount) => {
            const paketId = document.getElementById(`paket${rowCount}`).value;

            if (!paketId) {
                document.getElementById(`harga${rowCount}`).value = "";
                return;
            }

            axios.get(`/paket/paket_name/${paketId}`)
                .then(response => {
                    const paket = response.data.paket;

                    document.getElementById(`harga${rowCount}`).value = paket ? paket.harga : "";
                })
                .catch(error => {
                    console.error("Gagal memuat data paket:", error);
                    document.getElementById(`harga${rowCount}`).value = "";
                });
        };
    </script>
</x-app-layout>
