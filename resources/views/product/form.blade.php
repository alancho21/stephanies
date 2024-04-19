<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb-20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb-20">
            <label for="price" class="form-label">{{ __('Price') }}</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product?->price) }}" id="price" placeholder="Price">
            {!! $errors->first('price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb-20">
            <label for="description" class="form-label">{{ __('Description') }}</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $product?->description) }}" id="description" placeholder="Description">
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb-20">
            <label for="category_id" class="form-label">{{ __('Category Id') }}</label>
            <input type="text" name="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ old('category_id', $product?->category_id) }}" id="category_id" placeholder="Category Id">
            {!! $errors->first('category_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb-20">
            <label for="ruta_imagen" class="form-label">{{ __('Ruta Imagen') }}</label>
            <input type="text" name="ruta_imagen" class="form-control @error('ruta_imagen') is-invalid @enderror" value="{{ old('ruta_imagen', $product?->ruta_imagen) }}" id="ruta_imagen" placeholder="Ruta Imagen">
            {!! $errors->first('ruta_imagen', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="col-md-12 mt-20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>