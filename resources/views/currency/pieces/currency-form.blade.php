<form role="form" method="POST"
    @if (isset($currency))
        action="{{ route('currencies.update', $currency->id) }}">
    @else
        action="{{ route('currencies.store') }}">
    @endif

    {{ csrf_field() }}
    @isset($currency)
        {{ method_field('PUT') }}
    @endisset

    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input class="form-control"
                   id="title" type="text"
                   name="title"
                   value="{{ isset($currency) ? old('title', $currency->title) : old('title') }}">
        </div>
    </div>
    @if ($errors->has('title'))
        <div class="alert alert-warning">
            {{ $errors->first('title') }}
        </div>
    @endif

    <div class="form-group row">
        <label for="short-name" class="col-sm-2 col-form-label">Short name</label>
        <div class="col-sm-10">
            <input class="form-control"
                   id="short-name"
                   type="text"
                   name="short_name"
                   value="{{ isset($currency) ? old('short_name', $currency->short_name) : old('short_name') }}">
        </div>
    </div>
    @if ($errors->has('short_name'))
        <div class="alert alert-warning">
            {{ $errors->first('short_name') }}
        </div>
    @endif

    <div class="form-group row">
        <label for="logo_url" class="col-sm-2 col-form-label">Logo URl</label>
        <div class="col-sm-10">
            <input class="form-control"
                   id="logo_url" type="text"
                   name="logo_url"
                   value="{{ isset($currency) ? old('logo_url', $currency->logo_url)  : old('logo_url') }}">
        </div>
    </div>
    @if ($errors->has('logo_url'))
        <div class="alert alert-warning">
            {{ $errors->first('logo_url') }}
        </div>
    @endif

    <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
            <input class="form-control"
                   id="price" type="text"
                   name="price"
                   value="{{ isset($currency) ? old('price', $currency->price) : old('price') }}">
        </div>
    </div>
    @if ($errors->has('price'))
        <div class="alert alert-warning">
            {{ $errors->first('price') }}
        </div>
    @endif

    <div>
        <button class="btn btn-success" type="submit">Save</button>
    </div>
</form>