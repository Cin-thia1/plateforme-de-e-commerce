<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Créer un livreur</title>
</head>
<body>
    <h1>Créer un livreur</h1>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('couriers.store') }}" method="POST">
        @csrf
        <div>
            <label>Nom</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label>Téléphone</label>
            <input type="text" name="phone" value="{{ old('phone') }}">
        </div>
        <div>
            <label>Véhicule</label>
            <input type="text" name="vehicle" value="{{ old('vehicle') }}">
        </div>
        <div>
            <label>Status</label>
            <select name="status">
                <option value="available">available</option>
                <option value="unavailable">unavailable</option>
            </select>
        </div>
        <div>
            <label>Order ID (optionnel)</label>
            <input type="number" name="order_id" value="{{ old('order_id') }}">
        </div>
        <div>
            <button type="submit">Enregistrer</button>
        </div>
    </form>

    <p><a href="{{ route('couriers.index') }}">Retour à la liste</a></p>
</body>
</html>
