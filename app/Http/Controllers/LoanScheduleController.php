<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanSchedule;
use Illuminate\Http\Request;

class LoanScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($loanSchedule)
    {
        //
        $schedules = LoanSchedule::where('loan_id', '=', $loanSchedule)->get();
        $payment_amount = LoanSchedule::where('loan_id', '=', $loanSchedule)->first();
        $loans = Loan::where('loan_id', '=', $loanSchedule)->with('customers')->first();
        $customer = $loans->customers[0];

        $total_payment_amount = 0;

        foreach ($schedules as $schedule) {
            $total_payment_amount += $payment_amount->payment_amount;
        }

        $laon_amout = $loans->loan_amount;
        $total_interest = $total_payment_amount - $laon_amout;

        // dd($loans->start_date);

        return view('schedule.index', compact(
            [
                'schedules',
                'laon_amout',
                'total_payment_amount',
                'total_interest',
                'loans',
                'customer',
            ]
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanSchedule $loanSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LoanSchedule $loanSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanSchedule $loanSchedule)
    {
        //
    }
}
