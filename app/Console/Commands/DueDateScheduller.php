<?php

namespace App\Console\Commands;

use App\Models\LoanApplications;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DueDateScheduller extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'duedate:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check remainings duedate daily for a given date';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $dataBase = LoanApplications::where('id',1)->first();
        // $dueDate = Carbon::parse($dataBase->due_date);
        $loans = LoanApplications::where('status_id',6)->get();
        foreach ($loans as $loan ){
            $now = Carbon::now();
            $dueDate = Carbon::parse($loan->due_date);
            if($now->day < $dueDate->day && $now->month < $dueDate->month && $now->year <= $dueDate->year) {
                $sisaJatuhTempo = $now->diffInDays($dueDate);
                $tanggal = $sisaJatuhTempo.' hari lagi';
            } else if ($now->day > $dueDate->day && $now->month < $dueDate->month && $now->year <= $dueDate->year) {
                $sisaJatuhTempo = $now->diffInDays($dueDate);
                $tanggal = $sisaJatuhTempo.' hari lagi';
            } else if ($now->day < $dueDate->day && $now->month > $dueDate->month && $now->year <= $dueDate->year) {
                $sisaJatuhTempo = $now->diffInDays($dueDate);
                $tanggal = 'terlambat '.$sisaJatuhTempo.' hari';
            } else if ($now->day < $dueDate->day && $now->month < $dueDate->month && $now->year > $dueDate->year) {
                $sisaJatuhTempo = $now->diffInDays($dueDate);
                $tanggal = 'terlambat '.$sisaJatuhTempo.' hari';
            } else if ($now->day > $dueDate->day && $now->month < $dueDate->month && $now->year > $dueDate->year) {
                $sisaJatuhTempo = $now->diffInDays($dueDate);
                $tanggal = 'terlambat '.$sisaJatuhTempo.' hari';
            } else if ($now->day >= $dueDate->day && $now->month >= $dueDate->month && $now->year < $dueDate->year) {
                $sisaJatuhTempo = $now->diffInDays($dueDate);
                $tanggal = $sisaJatuhTempo.' hari lagi';
            }

            DB::table('loan_applications')
            ->where('id', $loan->id)
            ->update(['status_due_date' => $tanggal]);
        }

        $this->info('Successfully sent daily quote to everyone.');
    }
}
