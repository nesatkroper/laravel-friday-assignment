<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanSchedule extends Model
{
    //
    protected $table = 'loan_schedules';
    protected $primaryKey = 'schedule_id';
    protected $fillable = [
        'loan_id',
        'payment_date',
        'payment_amount',
        'principal_paid',
        'interest_paid',
        'balance',
    ];

    public function loans()
    {
        return $this->belongsTo(Loan::class, 'loan_id', 'loan_id');
    }
}
