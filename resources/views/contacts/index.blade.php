@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-sm my-3 fw-bolder">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                    </svg>
                    Adicionar contacto
                </a>

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {!! session('success') !!}
                    </div>
                @endif
            </div>
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

@push('delete')
    <script>
        const getCSFR = () => document.querySelector('input[name=_token]').value;

        const fetchDelete = (id, url, contact = '') => {
            document.body.style.cursor = 'wait';

            const headers = new Headers({
                'X-CSRF-TOKEN': getCSFR()
            })

            if (confirm('Deseja eliminar "' + contact + '" permanentemente?')) {

                return fetch(url + id, {
                    method: 'DELETE',
                    headers
                }).then(function () {
                    window.location.reload();
                })

            }

            document.body.style.cursor = 'unset';
        }
    </script>
@endpush
