<x-layout>
    <a class="btn btn-outline-primary mb-3" href="{{ route('loans.create') }}">
        <i class="bi bi-currency-exchange me-2"></i> Create New Loan
    </a>
    @if(session('create'))
    <div class="alert alert-success">
        {{ session("create") }}
    </div>
    @endif
    <!--  -->
    @if(session('update'))
    <div class="alert alert-warning">
        {{ session("update") }}
    </div>
    @endif
    <!--  -->
    @if(session('delete'))
    <div class="alert alert-danger">
        {{ session("delete") }}
    </div>
    @endif
    <div class="border rounded-3 shadow-sm p-2">
        <table id="example" class="table table-striped w-100 rounded-3">
            <thead>
                <tr>
                    <th style="width: 40px">No</th>
                    <th>Cutomer Name</th>
                    <th>Amount</th>
                    <th>Interest Rate</th>
                    <th>Loan Term</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Payment Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($loans as $row)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <!--  -->
                    @foreach($row->customers as $customer)
                    <td>{{$customer->first_name.' '.$customer->last_name}}</td>
                    @endforeach
                    <!--  -->
                    <td>$ {{number_format( $row->loan_amount, 2)}}</td>
                    <td>{{number_format($row->interest_rate, 2)}} %</td>
                    <td>{{$row->loan_term}} month</td>
                    <td>
                        {{date('d-m-Y', strtotime($row->start_date))}}
                    </td>
                    <td>{{date('d-m-Y', strtotime($row->end_date))}}</td>
                    <td>
                        {{$row->payment_type == 'flat'? 'Flat Payment':'Declining Payment'}}
                    </td>
                    <td>
                        <div class="dropdown-center">
                            <button
                                class="btn btn-warning btn-sm dropdown-toggle"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                Option
                            </button>
                            <ul class="dropdown-menu">
                                <li class="d-flex flex-row">
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('schedule.show', $row->loan_id) }}"
                                        ><i
                                            class="bi bi-search pe-2 text-sm"
                                        ></i
                                        >Show Shedule</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('loans.edit',$row->loan_id) }}"
                                        ><i
                                            class="bi bi-pencil pe-2 text-sm"
                                        ></i
                                        >Edit Information</a
                                    >
                                </li>
                                <li>
                                    <form
                                        action="{{route('loans.destroy', $row->loan_id)}}"
                                        method="post"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            class="dropdown-item text-danger"
                                            type="submit"
                                        >
                                            <i
                                                class="bi bi-trash pe-2 text-sm"
                                            ></i
                                            >Delete Loan
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center">No data here :😢</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>
