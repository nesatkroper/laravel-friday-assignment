<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Loan;
use App\Models\LoanSchedule;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $loans = Loan::with('customers')->get();
        return view('loans.index', compact('loans'));
        // dd($loans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $customers = Customer::all();
        return view('loans.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'borrow_id' => 'required',
            'loan_amount' => 'required',
            'interest_rate' => 'required',
            'loan_term' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'payment_type' => 'required',
        ]);

        $loan = Loan::create([
            'borrow_id' => $validate['borrow_id'],
            'loan_amount' => $validate['loan_amount'],
            'interest_rate' => $validate['interest_rate'],
            'loan_term' => $validate['loan_term'],
            'start_date' => $validate['start_date'],
            'end_date' => $validate['end_date'],
            'payment_type' => $validate['payment_type'],
        ]);

        // base importance values
        $loan_amount = $validate['loan_amount'];
        $interest_rate = $validate['interest_rate'] / 100;
        $loan_term = $validate['loan_term'];
        $start_date = $validate['start_date'];
        $dayInMonth = 30;

        if ($validate['payment_type'] == 'flat') {
            $principal_paid = $loan_amount / $loan_term;
            for ($i = 0; $i < $request->loan_term; $i++) {
                $date = date_create($start_date);
                date_add($date, date_interval_create_from_date_string("{$dayInMonth} days"));
                $interest_paid =  $loan_amount * $interest_rate;
                $payment_amount = $principal_paid + $interest_paid;
                $balance = $loan_amount - $principal_paid;

                LoanSchedule::create([
                    'loan_id' => $loan->loan_id,
                    'payment_date' => date_format($date, "Y-m-d"),
                    'payment_amount' => $payment_amount,
                    'principal_paid' => $principal_paid,
                    'interest_paid' => $interest_paid,
                    'balance' => $balance,
                ]);

                $loan_amount -= $principal_paid;
                $i % 2 == 0 ? $dayInMonth += 30 : $dayInMonth += 31;
            }
        }

        if ($validate['payment_type'] == 'declining') {
            $payment_amount = ($loan_amount * $interest_rate) / (1 - pow(1 + $interest_rate, -$loan_term));

            for ($i = 0; $i < $loan_term; $i++) {
                $interest_paid = $loan_amount * $interest_rate;
                $principal_paid = $payment_amount - $interest_paid;
                $balance = $loan_amount - $principal_paid;

                $date = date_create($start_date);
                date_add($date, date_interval_create_from_date_string("{$dayInMonth} days"));

                if ($i == 0) {
                    LoanSchedule::create([
                        'loan_id' => $loan->loan_id,
                        'payment_date' => date_format($date, "Y-m-d"),
                        'payment_amount' => $payment_amount,
                        'principal_paid' => $principal_paid,
                        'interest_paid' => $interest_paid,
                        'balance' => $balance
                    ]);
                    $loan_amount = $balance;
                    $i % 2 == 0 ? $dayInMonth += 30 : $dayInMonth += 31;
                } else {
                    LoanSchedule::create([
                        'loan_id' => $loan->loan_id,
                        'payment_date' => date_format($date, "Y-m-d"),
                        'payment_amount' => $payment_amount,
                        'principal_paid' => $principal_paid,
                        'interest_paid' => $interest_paid,
                        'balance' => $balance
                    ]);
                    $loan_amount = $balance;

                    $i % 2 == 0 ? $dayInMonth += 30 : $dayInMonth += 31;
                }
            }
        }

        return redirect()->route('loans.index')->with('create', 'Loan created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($loan)
    {
        //
        Loan::destroy($loan);
        LoanSchedule::where('loan_id', '=', $loan)->delete();
        return redirect()->route('loans.index')->with('delete', 'Loan deleted successfully');
    }
}
