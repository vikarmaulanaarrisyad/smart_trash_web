@extends('layouts.master')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Halaman Admin</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible">
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                Success alert preview. This alert is dismissable.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <x-card class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('img/trash_penuh_.png') }}" alt="Trash"
                    style="filter: invert(45%) sepia(81%) saturate(1957%) hue-rotate(162deg) brightness(95%) contrast(101%);" />
                <h5 class="text-center mt-2">Bobot: 100%</h5>
            </x-card>
        </div>
        <div class="col-6">
            <x-card class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('img/trash_penuh_.png') }}" alt="Trash"
                    style="filter: invert(87%) sepia(35%) saturate(2088%) hue-rotate(14deg) brightness(114%) contrast(102%);" />
                <h5 class="text-center">Status: <b>Tertutup</b></h5>
            </x-card>
        </div>
        {{--  <div class="col-4">
            <x-card class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('img/trash_penuh_.png') }}" alt="Trash"
                    style="filter: invert(26%) sepia(76%) saturate(5689%) hue-rotate(351deg) brightness(100%) contrast(139%);" />
            </x-card>
        </div>  --}}
    </div>
@endsection
