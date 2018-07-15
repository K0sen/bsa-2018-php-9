@can ('delete', $currency)
{{ Form::open(['route' => ['currencies.destroy', $currency->id], 'method' => 'delete', 'class' => 'd-inline-block']) }}
<button class="btn btn-danger delete-button">
    <i class="fas fa-trash"></i> Delete
</button>
{{ Form::close() }}
@endcan
