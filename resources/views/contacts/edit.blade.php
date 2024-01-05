@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header">
                        Editar contacto - {{ $contact->name }}
                    </div>
                    <div class="card-body">
                        <form class="user" method="POST" action="{{ route('contacts.update', $contact->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" required value="{{ $contact->name }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required value="{{ $contact->email }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Contacto</label>
                                <input type="number" class="form-control" id="contact" name="contact" required value="{{ $contact->contact }}">

                            </div>

                            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
