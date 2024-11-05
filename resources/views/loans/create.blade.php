<x-layout>
    <form action="{{ route('loans.store') }}" method="post">
        @csrf
        <div class="card card-success card-outline mb-4">
            <div class="card-header">
                <div class="card-title">Create New Customer</div>
            </div>
            <div class="card-body">
                <!--  -->
                <div class="mb-3 gap-2 d-flex flex-row">
                    <div class="d-flex flex-column w-100">
                        <label for="basic-url" class="form-label"
                            >Customer Name</label
                        >
                        <select
                            class="form-select"
                            name="borrow_id"
                            aria-label="Default select example"
                        >
                            <option selected>Select customer</option>
                            @foreach($customers as $customer)
                            <option value="{{$customer->customer_id}}">
                                {{$customer->customer_id}}
                                {{$customer->first_name}}
                                {{$customer->last_name}}
                            </option>
                            @endforeach
                        </select>
                        @error('borrow_id')
                        <span class="form-text text-danger">{{
                            $message
                        }}</span>
                        @enderror
                    </div>
                    <div class="d-flex flex-column w-100">
                        <label for="basic-url" class="form-label"
                            >Loan Amount</label
                        >
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input
                                type="number"
                                class="form-control"
                                name="loan_amount"
                                placeholder="100.99"
                            />
                        </div>
                        @error('loan_amount')
                        <span class="form-text text-danger">{{
                            $message
                        }}</span>
                        @enderror
                    </div>
                </div>
                <!--  -->
                <div class="mb-3 gap-2 d-flex flex-row">
                    <div class="d-flex flex-column w-100">
                        <label for="basic-url" class="form-label"
                            >Interest Rate</label
                        >
                        <div class="input-group">
                            <input
                                type="number"
                                min="0"
                                step="0.01"
                                class="form-control"
                                name="interest_rate"
                                placeholder="12"
                            />
                            <span class="input-group-text">% in month</span>
                        </div>
                        @error('interest_rate')
                        <span class="form-text text-danger">{{
                            $message
                        }}</span>
                        @enderror
                    </div>
                    <div class="d-flex flex-column w-100">
                        <label for="basic-url" class="form-label"
                            >Loan Term</label
                        >
                        <div class="input-group">
                            <input
                                id="input_months"
                                type="number"
                                name="loan_term"
                                class="form-control"
                                placeholder="24"
                                min="6"
                            />
                            <span class="input-group-text">month</span>
                        </div>
                        @error('loan_term')
                        <span class="form-text text-danger">{{
                            $message
                        }}</span>
                        @enderror
                    </div>
                    <!--  -->
                    <div class="d-flex flex-column w-100">
                        <label for="basic-url" class="form-label"
                            >Payment Type</label
                        >
                        <select
                            class="form-select"
                            name="payment_type"
                            aria-label="Default select example"
                        >
                            <option selected>Select Interest Rate</option>
                            <option value="flat">1 -Flat Payment</option>
                            <option value="declining">
                                2 -Declining Payment
                            </option>
                        </select>
                        @error('payment_type')
                        <span class="form-text text-danger">{{
                            $message
                        }}</span>
                        @enderror
                    </div>
                </div>
                <!--  -->
                <div class="mb-3 gap-2 d-flex flex-row">
                    <div class="d-flex flex-column w-100">
                        <label for="basic-url" class="form-label"
                            >Start Date</label
                        >
                        <div class="input-group">
                            <input
                                id="start_date"
                                type="date"
                                name="start_date"
                                class="form-control"
                                value="{{ date('Y-m-d') }}"
                            />
                        </div>
                        @error('start_date')
                        <span class="form-text text-danger">{{
                            $message
                        }}</span>
                        @enderror
                    </div>
                    <div class="d-flex flex-column w-100">
                        <label for="basic-url" class="form-label"
                            >End Date</label
                        >
                        <div class="input-group">
                            <input
                                id="end_date"
                                type="date"
                                name="end_date"
                                class="form-control"
                            />
                        </div>
                        @error('end_date')
                        <span class="form-text text-danger">{{
                            $message
                        }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <a
                    href="{{ route('loans.index') }}"
                    class="btn btn-secondary ms-2"
                    >Cancel</a
                >
            </div>
        </div>
    </form>
    <script>
        const input_months = document.getElementById("input_months");
        const start_date = document.getElementById("start_date").value;
        const end_date = document.getElementById("end_date");

        const addMonthsToDate = (date, monthsToAdd) => {
            let newDate = new Date(date);
            newDate.setMonth(newDate.getMonth() + monthsToAdd);
            return newDate.toISOString().split("T")[0];
        };

        input_months.addEventListener("input", () => {
            let AddMonth = parseInt(input_months.value, 10);
            let currentDate = new Date(start_date);
            end_date.value = addMonthsToDate(currentDate, AddMonth);
        });
    </script>
</x-layout>
