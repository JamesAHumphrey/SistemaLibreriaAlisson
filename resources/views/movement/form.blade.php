<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="observation" class="form-label">{{ __('Observation') }}</label>
            <input type="text" name="observation" class="form-control @error('observation') is-invalid @enderror" value="{{ old('observation', $movement?->observation) }}" id="observation" placeholder="Observation">
            {!! $errors->first('observation', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="amount" class="form-label">{{ __('Amount') }}</label>
            <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount', $movement?->amount) }}" id="amount" placeholder="Amount">
            {!! $errors->first('amount', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="unit_value" class="form-label">{{ __('Unit Value') }}</label>
            <input type="text" name="unit_value" class="form-control @error('unit_value') is-invalid @enderror" value="{{ old('unit_value', $movement?->unit_value) }}" id="unit_value" placeholder="Unit Value">
            {!! $errors->first('unit_value', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="total_value" class="form-label">{{ __('Total Value') }}</label>
            <input type="text" name="total_value" class="form-control @error('total_value') is-invalid @enderror" value="{{ old('total_value', $movement?->total_value) }}" id="total_value" placeholder="Total Value">
            {!! $errors->first('total_value', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="date" class="form-label">{{ __('Date') }}</label>
            <input type="text" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', $movement?->date) }}" id="date" placeholder="Date">
            {!! $errors->first('date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="unit_value_balance" class="form-label">{{ __('Unit Value Balance') }}</label>
            <input type="text" name="unit_value_balance" class="form-control @error('unit_value_balance') is-invalid @enderror" value="{{ old('unit_value_balance', $movement?->unit_value_balance) }}" id="unit_value_balance" placeholder="Unit Value Balance">
            {!! $errors->first('unit_value_balance', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="total_balance" class="form-label">{{ __('Total Balance') }}</label>
            <input type="text" name="total_balance" class="form-control @error('total_balance') is-invalid @enderror" value="{{ old('total_balance', $movement?->total_balance) }}" id="total_balance" placeholder="Total Balance">
            {!! $errors->first('total_balance', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="amount_balance" class="form-label">{{ __('Amount Balance') }}</label>
            <input type="text" name="amount_balance" class="form-control @error('amount_balance') is-invalid @enderror" value="{{ old('amount_balance', $movement?->amount_balance) }}" id="amount_balance" placeholder="Amount Balance">
            {!! $errors->first('amount_balance', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="code" class="form-label">{{ __('Code') }}</label>
            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code', $movement?->code) }}" id="code" placeholder="Code">
            {!! $errors->first('code', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="product_id" class="form-label">{{ __('Product Id') }}</label>
            <input type="text" name="product_id" class="form-control @error('product_id') is-invalid @enderror" value="{{ old('product_id', $movement?->product_id) }}" id="product_id" placeholder="Product Id">
            {!! $errors->first('product_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="type_id" class="form-label">{{ __('Type Id') }}</label>
            <input type="text" name="type_id" class="form-control @error('type_id') is-invalid @enderror" value="{{ old('type_id', $movement?->type_id) }}" id="type_id" placeholder="Type Id">
            {!! $errors->first('type_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="employee_id" class="form-label">{{ __('Employee Id') }}</label>
            <input type="text" name="employee_id" class="form-control @error('employee_id') is-invalid @enderror" value="{{ old('employee_id', $movement?->employee_id) }}" id="employee_id" placeholder="Employee Id">
            {!! $errors->first('employee_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>