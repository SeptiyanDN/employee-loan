<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class LoanApplications extends Model {
    use HasFactory, LogsActivity;

    protected $fillable = [
        'number_application',
        'employee_id',
        'typeLoan_id',
        'period',
        'bunga',
        'loan_ammount',
        'description',
        'status_id',
        'created_by_id',
        'remaining_payment',
        'mountly_installment',
        'due_date',
        'status_due_date'
    ];



    // log the changed attributes for all event
    protected static $logAttributes = ['number_application','status_id','description'];


       public function Employee()
    {
        return $this->belongsTo('App\Models\Employee','employee_id','id');
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
    protected static $logName = 'applications loan';
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['number_application','status_id','description'])
        ->useLogName('loan_application')
        ->logOnlyDirty();
    }
    protected $casts = [
        'properties' => 'collection',
    ];
    public function tapActivity(Activity $activity,string $eventName)
    {
        $current_user = Auth::user()->name;
        $event        = $activity->attributes['event'];
        $data         = $activity->relations['subject']->attributes['number_application'];

        $activity->description   = "Successfully! {$current_user} has {$event} Application Loan. Number Application : '{$data}'";
    }
    // public function getDescriptionForEvent(string $eventName): string
    // {
    //     return $this->name . " {$eventName} Oleh: " . Auth::user()->name;
    // }



}
