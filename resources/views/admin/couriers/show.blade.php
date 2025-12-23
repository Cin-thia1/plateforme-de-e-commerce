<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Voir livreur</title>
</head>
<body>
    <h1>Livreur #{{ $courier->id }}</h1>

    <ul>
        <li>Nom: {{ $courier->name }}</li>
        <li>Téléphone: {{ $courier->phone }}</li>
        <li>Véhicule: {{ $courier->vehicle }}</li>
        <li>Status: {{ $courier->status }}</li>
        <li>Order ID: {{ $courier->order_id ?? '-' }}</li>
    </ul>

    <p><a href="{{ route('couriers.index') }}">Retour à la liste</a></p>
</body>
</html>
