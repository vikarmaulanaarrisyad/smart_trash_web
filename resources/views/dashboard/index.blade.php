@extends('layouts.master')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Halaman Admin</li>
@endsection

@push('css')
    <style>
        .color-overlay {
            position: relative;
            display: inline-block;
        }

        .color-overlay::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: yellow;
            /* Ganti dengan warna yang diinginkan */
            mix-blend-mode: color;
            /* Menggunakan blend mode color */
            opacity: 0.7;
            /* Sesuaikan opasitas sesuai kebutuhan */
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                Success alert preview. This alert is dismissable.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <x-card>
                <div class="color-overlay">
                    <img src="{{ asset('img/trash_aman.jpg') }}" alt="Trash" />
                </div>
            </x-card>
        </div>
        <div class="col-6"></div>
    </div>
@endsection
