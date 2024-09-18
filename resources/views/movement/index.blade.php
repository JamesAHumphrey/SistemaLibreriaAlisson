@extends('layouts.app')

@section('template_title')
    Movements
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Movements') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('movements.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Observation</th>
									<th >Amount</th>
									<th >Unit Value</th>
									<th >Total Value</th>
									<th >Date</th>
									<th >Unit Value Balance</th>
									<th >Total Balance</th>
									<th >Amount Balance</th>
									<th >Code</th>
									<th >Product Id</th>
									<th >Type Id</th>
									<th >Employee Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movements as $movement)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $movement->observation }}</td>
										<td >{{ $movement->amount }}</td>
										<td >{{ $movement->unit_value }}</td>
										<td >{{ $movement->total_value }}</td>
										<td >{{ $movement->date }}</td>
										<td >{{ $movement->unit_value_balance }}</td>
										<td >{{ $movement->total_balance }}</td>
										<td >{{ $movement->amount_balance }}</td>
										<td >{{ $movement->code }}</td>
										<td >{{ $movement->product_id }}</td>
										<td >{{ $movement->type_id }}</td>
										<td >{{ $movement->employee_id }}</td>

                                            <td>
                                                <form action="{{ route('movements.destroy', $movement->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('movements.show', $movement->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('movements.edit', $movement->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $movements->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
