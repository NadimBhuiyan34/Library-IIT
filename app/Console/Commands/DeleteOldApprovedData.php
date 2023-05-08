<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\BookRequest;
class DeleteOldApprovedData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:old-approved-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete approved data after three days automatically';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         $threeDaysAgo = now()->subDays(3);
        $overdueRequests = BookRequest::where('approved_date', '<',$threeDaysAgo)
            ->where('status', '!=', 'issue')
            ->where('status', 'approved')
            ->get();
        foreach ($overdueRequests as $request) {
    // Get the book associated with this request
          $stock = $request->product->bookquantity;

    // Increase the book quantity by 1
        $book->increment('quantity');

    // Delete the request
         $request->delete();
}
            
        return Command::SUCCESS;
    }
}
