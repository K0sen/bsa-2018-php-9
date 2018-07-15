<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">&nbsp;</th>
        <th scope="col">Name</th>
        <th scope="col">Short Name</th>
        <th scope="col">Price ($)</th>
        @can ('edit' or 'update')
        <th scope="col">Edit/Update</th>
        @endcan
    </tr>
    </thead>
    <tbody>
        @foreach ($currencies as $key => $currency)
            @include('currency.pieces.currency-row', ['currency' => $currency, 'row' => $key + 1])
        @endforeach
    </tbody>
</table>
