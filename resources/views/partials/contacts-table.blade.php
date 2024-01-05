<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Contacto</th>
        <th>Email</th>
        <th>Criado a</th>
        @auth
        <th></th>
        @endauth
    </tr>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->contact }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->created_at }}</td>
            @auth()
            <td>
                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-block btn-sm btn-primary">Ver</a>
                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-block btn-sm btn-primary">Editar</a>
                <button class="btn btn-block btn-sm btn-danger" onclick="fetchDelete('{{ $contact->id }}', '/contacts/', '{{ $contact->name }}');">Remover</button>
            </td>
            @endauth
        </tr>
    @endforeach
    </tbody>
</table>
