<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des livreurs</title>
</head>
<body>
    <h1>Livreurs</h1>

    <p><a href="{{ route('couriers.create') }}">Créer un livreur</a></p>

    @if(session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="6">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Véhicule</th>
                <th>Status</th>
                <th>Commande</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($couriers as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->phone }}</td>
                <td>{{ $c->vehicle }}</td>
                <td>{{ $c->status }}</td>
                <td>{{ $c->order_id ?? '-' }}</td>
                <td>
                    <a href="{{ route('couriers.show', $c) }}">Voir</a> |
                    <a href="{{ route('couriers.edit', $c) }}">Éditer</a> |
                    <form action="{{ route('couriers.destroy', $c) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Supprimer ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7">Aucun livreur.</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $couriers->links() }}
</body>
</html>
