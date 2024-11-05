<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    //
    protected $table = 'loans';
    protected $primaryKey = 'loan_id';
    protected $fillable = [
        'borrow_id',
        'loan_amount',
        'interest_rate',
        'loan_term',
        'start_date',
        'end_date',
        'payment_type',
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class, 'customer_id', 'borrow_id');
    }

    public function loan_schedules()
    {
        return $this->hasOne(LoanSchedule::class, 'loan_id', 'loan_id');
    }
}
