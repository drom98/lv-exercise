@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container py-5 text-center">
                    <h1 class="text-body-emphasis fw-bold">Lista de contactos</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Contactos ({{ \App\Models\Contact::count() }})</div>
                    <div class="card-body">
                        @include('partials.contacts-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
