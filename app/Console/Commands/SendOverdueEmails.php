<?php

namespace App\Console\Commands;
use App\Mail\OverdueNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Models\BookRequest;
class SendOverdueEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:overdue-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send overdue email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
           $overdueRequests = BookRequest::where('return_date', '<', Carbon::now())
            ->where('status', '!=', 'return')
            ->get();

        foreach ($overdueRequests as $request) {
            $userName = $request->users->name;
            $userEmail = $request->users->email;
            $book_title = $request->product->booktitle;
            $fine = $request->fine;
            // $daysOverdue = Carbon::parse($request->return_date)->diffInDays(Carbon::now());

            Mail::to($userEmail)->send(new OverdueNotification( $userName,  $book_title, $fine));

            // Mark the book request as notified to prevent multiple notifications
            $request->notified = true;
            $request->save();
        }
        return Command::SUCCESS;
    }
}
