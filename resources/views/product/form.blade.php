<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="description" class="form-label">{{ __('Description') }}</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $product?->description) }}" id="description" placeholder="Description">
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="retail_price" class="form-label">{{ __('Retail Price') }}</label>
            <input type="text" name="retail_price" class="form-control @error('retail_price') is-invalid @enderror" value="{{ old('retail_price', $product?->retail_price) }}" id="retail_price" placeholder="Retail Price">
            {!! $errors->first('retail_price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="wholesale_price" class="form-label">{{ __('Wholesale Price') }}</label>
            <input type="text" name="wholesale_price" class="form-control @error('wholesale_price') is-invalid @enderror" value="{{ old('wholesale_price', $product?->wholesale_price) }}" id="wholesale_price" placeholder="Wholesale Price">
            {!! $errors->first('wholesale_price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="current_stock" class="form-label">{{ __('Current Stock') }}</label>
            <input type="text" name="current_stock" class="form-control @error('current_stock') is-invalid @enderror" value="{{ old('current_stock', $product?->current_stock) }}" id="current_stock" placeholder="Current Stock">
            {!! $errors->first('current_stock', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="current_total" class="form-label">{{ __('Current Total') }}</label>
            <input type="text" name="current_total" class="form-control @error('current_total') is-invalid @enderror" value="{{ old('current_total', $product?->current_total) }}" id="current_total" placeholder="Current Total">
            {!! $errors->first('current_total', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="current_unit_price" class="form-label">{{ __('Current Unit Price') }}</label>
            <input type="text" name="current_unit_price" class="form-control @error('current_unit_price') is-invalid @enderror" value="{{ old('current_unit_price', $product?->current_unit_price) }}" id="current_unit_price" placeholder="Current Unit Price">
            {!! $errors->first('current_unit_price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="minimum_stocks" class="form-label">{{ __('Minimum Stocks') }}</label>
            <input type="text" name="minimum_stocks" class="form-control @error('minimum_stocks') is-invalid @enderror" value="{{ old('minimum_stocks', $product?->minimum_stocks) }}" id="minimum_stocks" placeholder="Minimum Stocks">
            {!! $errors->first('minimum_stocks', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="code" class="form-label">{{ __('Code') }}</label>
            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code', $product?->code) }}" id="code" placeholder="Code">
            {!! $errors->first('code', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="category_id" class="form-label">{{ __('Category Id') }}</label>
            <input type="text" name="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ old('category_id', $product?->category_id) }}" id="category_id" placeholder="Category Id">
            {!! $errors->first('category_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="unit_id" class="form-label">{{ __('Unit Id') }}</label>
            <input type="text" name="unit_id" class="form-control @error('unit_id') is-invalid @enderror" value="{{ old('unit_id', $product?->unit_id) }}" id="unit_id" placeholder="Unit Id">
            {!! $errors->first('unit_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>