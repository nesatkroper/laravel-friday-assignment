<x-layout>
    <button
        onclick="window.print()"
        class="position-absolute btn border btn-secondary"
    >
        <i class="bi bi-printer me-2" data-lte-toggle="sidebar"></i>
        Print
    </button>
    <div id="print-content">
        <div class="d-flex flex-column">
            <p class="text-center fs-2 fw-bold m-0">
                FRIDAY ASSIGNMENT BANK Co.LTD
            </p>
            <p class="text-center fs-4 fw-semibold m-0">Siem Reap Brach</p>
            <p class="text-center fs-4 fw-semibold m-0">Loan Schedule</p>
            <hr />
        </div>
        <div class="container text-center fw-semibold">
            <div class="row">
                <div class="col text-start">Credit Officer:</div>
                <div class="col text-start">Suon Phanun</div>
                <div class="col text-start">Officer Number:</div>
                <div class="col text-start">010 280 202</div>
                <div class="col text-start">BM Number:</div>
                <div class="col text-start">010 280 202</div>
            </div>
            <div class="row">
                <div class="col text-start">Start Date:</div>
                <div class="col text-start">{{$loans->start_date}}</div>
                <div class="col text-start">End Date:</div>
                <div class="col text-start">{{$loans->end_date}}</div>
                <div class="col text-start">Duration Day:</div>
                <div class="col text-start">
                    {{$loans->loan_term * 30.5 - 1}} day
                </div>
            </div>
            <div class="row">
                <div class="col text-start">Customer Name:</div>
                <div class="col text-start">
                    {{$customer->first_name .' '.$customer->last_name}}
                </div>
                <div class="col text-start">Loan Account:</div>
                <div class="col text-start">027 762 640 042</div>
                <div class="col text-start">Saving Account:</div>
                <div class="col text-start">027 762 640 042</div>
            </div>
            <div class="row">
                <div class="col text-start">Loan Amount:</div>
                <div class="col text-start">
                    $ {{ number_format($laon_amout, 2) }}
                </div>
                <div class="col text-start">Interest Amount:</div>
                <div class="col text-start">
                    $ {{ number_format($total_interest, 2) }}
                </div>
                <div class="col text-start">Total Amount:</div>
                <div class="col text-start">
                    $ {{ number_format($total_payment_amount, 2) }}
                </div>
            </div>
            <div class="row">
                <div class="col text-start">Interest Rate:</div>
                <div class="col text-start">{{$loans->interest_rate}} %</div>
                <div class="col text-start">Loan Time:</div>
                <div class="col text-start">1</div>
                <div class="col text-start">Mininium:</div>
                <div class="col text-start">6 month</div>
            </div>
        </div>
        <hr />
        <div class="border rounded-3 shadow-sm p-2">
            <table id="example" class="table table-striped w-100 rounded-3">
                <thead>
                    <tr>
                        <th style="width: 40px">No</th>
                        <th>Payment Date</th>
                        <th>Principal Paid</th>
                        <th>Interest Paid</th>
                        <th>Payment Amount</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($schedules as $row)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            {{date('d-m-Y', strtotime($row->payment_date))}}
                        </td>
                        <td>$ {{number_format($row->principal_paid, 2)}}</td>
                        <td>$ {{number_format($row->interest_paid, 2)}}</td>
                        <td>$ {{number_format($row->payment_amount, 2)}}</td>
                        <td>$ {{number_format($row->balance, 2)}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">
                            No data here :😢
                        </td>
                    </tr>
                    @endforelse
                    <tr>
                        <th colspan="2">Sumary:</th>
                        <th>$ {{ number_format($laon_amout, 2) }}</th>
                        <th>$ {{ number_format($total_interest, 2) }}</th>
                        <th>$ {{ number_format($total_payment_amount, 2) }}</th>
                        <th>$ 0.00</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        const quality = 1;
        html2canvas(document.querySelector("#html"), { scale: quality }).then(
            (canvas) => {
                const pdf = new jsPDF("p", "mm", "a4");
                pdf.addImage(
                    canvas.toDataURL("image/png"),
                    "PNG",
                    0,
                    0,
                    211,
                    298
                );
                pdf.save(filename);
            }
        );
    </script>
</x-layout>
