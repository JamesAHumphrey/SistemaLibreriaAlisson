@extends('layouts.app')

@section('template_title')
    Sales
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sales') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('sales.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Price</th>
									<th >Amount</th>
									<th >Customer Name</th>
									<th >Customer Phone</th>
									<th >Subtotal</th>
									<th >Total</th>
									<th >Discount</th>
									<th >Invoice Number</th>
									<th >Code</th>
									<th >Employee Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $sale->price }}</td>
										<td >{{ $sale->amount }}</td>
										<td >{{ $sale->customer_name }}</td>
										<td >{{ $sale->customer_phone }}</td>
										<td >{{ $sale->subtotal }}</td>
										<td >{{ $sale->total }}</td>
										<td >{{ $sale->discount }}</td>
										<td >{{ $sale->invoice_number }}</td>
										<td >{{ $sale->code }}</td>
										<td >{{ $sale->employee_id }}</td>

                                            <td>
                                                <form action="{{ route('sales.destroy', $sale->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('sales.show', $sale->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('sales.edit', $sale->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $sales->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
