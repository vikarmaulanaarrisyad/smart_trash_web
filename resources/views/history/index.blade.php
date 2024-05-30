@extends('layouts.master')

@section('title', 'Data History Monitoring Sampah')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">Data Sampah</li>
    <li class="breadcrumb-item active">History</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <x-card>
                <x-slot name="header">
                    <h4><i class="fas fa-trash"></i> Data History</h4>
                </x-slot>

                <div class="d-flex justify-content-between">
                    <div class="form-group">
                        <label for="status2">Status</label>
                        <select name="status2" id="status2" class="custom-select">
                            <option value="" selected>Semua</option>
                            <option value="Penuh" {{ request('status') == 'Penuh' ? 'selected' : '' }}>Penuh</option>
                            <option value="Sedang" {{ request('status') == 'Sedang' ? 'Sedang' : '' }}>Sedang</option>
                            <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Diarsipkan
                            </option>
                        </select>
                    </div>

                    <div class="d-flex">
                        <div class="form-group mx-3">
                            <label for="start_date2">Tanggal Awal</label>
                            <div class="input-group datepicker" id="start_date2" data-target-input="nearest">
                                <input type="text" name="start_date2" class="form-control datetimepicker-input"
                                    data-target="#start_date2" />
                                <div class="input-group-append" data-target="#start_date2" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end_date2">Tanggal Akhir</label>
                            <div class="input-group datepicker" id="end_date2" data-target-input="nearest">
                                <input type="text" name="end_date2" class="form-control datetimepicker-input"
                                    data-target="#end_date2" />
                                <div class="input-group-append" data-target="#end_date2" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
@include('include.datepicker')

@push('scripts')
    <script>
        let table;

        table = $('.table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('history.data') }}',
                data: function(d) {
                    d.status = $('[name=status2]').val();
                    d.start_date = $('[name=start_date2]').val();
                    d.end_date = $('[name=end_date2]').val();
                }
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

        $('[name=status2]').on('change', function() {
            table.ajax.reload();
        });

        $('.datepicker').on('change.datetimepicker', function() {
            table.ajax.reload();
        });
    </script>
@endpush
