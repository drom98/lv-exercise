@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('contacts.index') }}" class="btn btn-block btn-sm btn-secondary">Voltar</a>
                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-block btn-sm btn-primary">Editar</a>
                <button class="btn btn-block btn-sm btn-danger" onclick="fetchDelete('{{ $contact->id }}', '/contacts/', '{{ $contact->name }}');">Remover</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item"><strong class="d-inline-block w-50">Nome: </strong><span class="text-right">{{ $contact->name }}</span></li>
                    <li class="list-group-item"><strong class="d-inline-block w-50">Email: </strong><span class="text-right">{{ $contact->email }}</span></li>
                    <li class="list-group-item"><strong class="d-inline-block w-50">Contacto: </strong><span class="text-right">{{ $contact->contact }}</span></li>
                    <li class="list-group-item"><strong class="d-inline-block w-50">Atualizado a: </strong><span class="text-right">{{ $contact->updated_at->format('d/m/Y H:i') }}</span></li>
                    <li class="list-group-item"><strong class="d-inline-block w-50">Registado a: </strong><span class="text-right">{{ $contact->created_at->format('d/m/Y H:i') }}</span></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
