<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    //
    protected $fillable = [
        'begintime', 'endtime', 'hourlywage','plate','vehicleid', 'userid',
    ];

    public function user()
    {
        $this->hasOne(User::class);
    }
}
