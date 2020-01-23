<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simulator extends Model
{
    protected $fillable = [
        'interestRate',
        'collectionFee',
        'registrationFee',
        'consultationFee',
        'inputRangeLoanVal',
        'inputRangeLoanStep',
        'inputRangeLoanMax',
        'inputRangeLoanMin',
        'inputRangeTimesVal',
        'inputRangeTimesStep',
        'inputRangeTimesMax',
        'inputRangeTimesMin',
    ];
}
