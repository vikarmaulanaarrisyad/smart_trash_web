@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <x-card>
                <x-slot name="header">
                    <h4><i class="fas fa-trash"></i> Data Monitoring Sampah </h4>
                </x-slot>

                <x-table>
                    <x-slot name="thead">
                        <th>No</th>
                        <th>Kapasitas Sampah</th>
                        <th>Tinggi Sampah</th>
                        <th>Status</th>
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>
@endsection

@include('include.datatable')

@push('scripts')
    <script>
        let table;

        function fetchData() {
            table.ajax.reload(null, false); // Mengambil data tanpa mengatur ulang posisi halaman
        }

        table = $('.table').DataTable({
            serverSide: true,
            ajax: {
                url: '{{ route('sampah.data') }}',
                dataSrc: '',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'kapasitas'
                },
                {
                    data: 'tinggi_sampah'
                },
                {
                    data: 'status'
                },
            ],
        });

        // Set interval untuk mengambil data setiap 1 detik sekali
        setInterval(fetchData, 2000);
    </script>
@endpush
