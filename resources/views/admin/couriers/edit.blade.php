<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Éditer un livreur</title>
</head>
<body>
    <h1>Éditer livreur #{{ $courier->id }}</h1>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('couriers.update', $courier) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Nom</label>
            <input type="text" name="name" value="{{ old('name', $courier->name) }}" required>
        </div>
        <div>
            <label>Téléphone</label>
            <input type="text" name="phone" value="{{ old('phone', $courier->phone) }}">
        </div>
        <div>
            <label>Véhicule</label>
            <input type="text" name="vehicle" value="{{ old('vehicle', $courier->vehicle) }}">
        </div>
        <div>
            <label>Status</label>
            <select name="status">
                <option value="available" {{ $courier->status === 'available' ? 'selected' : '' }}>available</option>
                <option value="unavailable" {{ $courier->status === 'unavailable' ? 'selected' : '' }}>unavailable</option>
            </select>
        </div>
        <div>
            <label>Order ID (optionnel)</label>
            <input type="number" name="order_id" value="{{ old('order_id', $courier->order_id) }}">
        </div>
        <div>
            <button type="submit">Mettre à jour</button>
        </div>
    </form>

    <p><a href="{{ route('couriers.index') }}">Retour à la liste</a></p>
</body>
</html>
