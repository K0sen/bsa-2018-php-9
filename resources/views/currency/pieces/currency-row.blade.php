<tr>
    <td><img src="{{ $currency->logo_url }}" alt="logo"></td>
    <td><a href="{{ route('currencies.show', $currency->id) }}">{{ $currency->title }}</a></td>
    <td>{{ $currency->short_name }}</td>
    <td>{{ $currency->price }} USD</td>
    <td>
        @include('currency.pieces.edit-button', ['id' => $currency->id])
        @include('currency.pieces.delete-button', ['id' => $currency->id])
    </td>
</tr>
