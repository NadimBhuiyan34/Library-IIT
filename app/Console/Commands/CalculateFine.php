<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\BookRequest;
class CalculateFine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:fine';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate and save the fine for overdue book requests.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
           $overdueRequests = BookRequest::where('return_date', '<', Carbon::now()->toDateString())
            ->where('status', '!=', 'return')
            ->get();
        
         $today=Carbon::now();
        foreach ($overdueRequests as $request) {
            $issueDate = Carbon::parse($request->issue_date);
            $returnDate = Carbon::parse($request->return_date);
            
             $daysOverdue = $returnDate->diffInDays($today, false);

            $fine = $daysOverdue > 0 ? $daysOverdue * 2 : 0;

            $request->fine = $fine;
            $request->status = 'overdue';

            $request->save();
        }

        $this->info('Fine calculation complete.');
        
        return Command::SUCCESS;
    }
}
