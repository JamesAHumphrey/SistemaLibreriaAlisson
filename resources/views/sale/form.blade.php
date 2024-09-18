<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="price" class="form-label">{{ __('Price') }}</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $sale?->price) }}" id="price" placeholder="Price">
            {!! $errors->first('price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="amount" class="form-label">{{ __('Amount') }}</label>
            <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount', $sale?->amount) }}" id="amount" placeholder="Amount">
            {!! $errors->first('amount', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="customer_name" class="form-label">{{ __('Customer Name') }}</label>
            <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name', $sale?->customer_name) }}" id="customer_name" placeholder="Customer Name">
            {!! $errors->first('customer_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="customer_phone" class="form-label">{{ __('Customer Phone') }}</label>
            <input type="text" name="customer_phone" class="form-control @error('customer_phone') is-invalid @enderror" value="{{ old('customer_phone', $sale?->customer_phone) }}" id="customer_phone" placeholder="Customer Phone">
            {!! $errors->first('customer_phone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="subtotal" class="form-label">{{ __('Subtotal') }}</label>
            <input type="text" name="subtotal" class="form-control @error('subtotal') is-invalid @enderror" value="{{ old('subtotal', $sale?->subtotal) }}" id="subtotal" placeholder="Subtotal">
            {!! $errors->first('subtotal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="total" class="form-label">{{ __('Total') }}</label>
            <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" value="{{ old('total', $sale?->total) }}" id="total" placeholder="Total">
            {!! $errors->first('total', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="discount" class="form-label">{{ __('Discount') }}</label>
            <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount', $sale?->discount) }}" id="discount" placeholder="Discount">
            {!! $errors->first('discount', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="invoice_number" class="form-label">{{ __('Invoice Number') }}</label>
            <input type="text" name="invoice_number" class="form-control @error('invoice_number') is-invalid @enderror" value="{{ old('invoice_number', $sale?->invoice_number) }}" id="invoice_number" placeholder="Invoice Number">
            {!! $errors->first('invoice_number', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="code" class="form-label">{{ __('Code') }}</label>
            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code', $sale?->code) }}" id="code" placeholder="Code">
            {!! $errors->first('code', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="employee_id" class="form-label">{{ __('Employee Id') }}</label>
            <input type="text" name="employee_id" class="form-control @error('employee_id') is-invalid @enderror" value="{{ old('employee_id', $sale?->employee_id) }}" id="employee_id" placeholder="Employee Id">
            {!! $errors->first('employee_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>