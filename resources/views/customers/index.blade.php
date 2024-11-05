<x-layout>
    <a class="btn btn-primary mb-3" href="{{ route('customers.create') }}">
        <i class="bi bi-person-add me-2"></i> Add New Customer
    </a>
    <!--  -->
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
    <!--  -->
    <div class="border rounded-3 shadow-sm p-2">
        <table id="example" class="table table-striped w-100 rounded-3">
            <thead>
                <tr>
                    <th style="width: 40px">No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Postal Code</th>
                    <th>Country</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!--  -->
                @forelse($customers as $row)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$row->first_name .' '. $row->last_name }}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->phone_number}}</td>
                    <td>{{$row->address}}</td>
                    <td>{{$row->city}}</td>
                    <td>{{$row->state}}</td>
                    <td>{{$row->postal_code}}</td>
                    <td>{{$row->country}}</td>
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
                                    <a class="dropdown-item" href="#"
                                        ><i
                                            class="bi bi-search pe-2 text-sm"
                                        ></i
                                        >Show Detail</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('customers.edit',$row->customer_id) }}"
                                        ><i
                                            class="bi bi-pencil pe-2 text-sm"
                                        ></i
                                        >Edit Information</a
                                    >
                                </li>
                                <li>
                                    <form
                                        action="{{route('customers.destroy', $row->customer_id)}}"
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
                                            >Delete Customer
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <!--  -->
                @empty
                <tr>
                    <td colspan="10" class="text-center">No data here :😢</td>
                </tr>
                @endforelse
                <!--  -->
            </tbody>
        </table>
    </div>
</x-layout>
