<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Abonnement;
use Carbon\Carbon;

class UpdateExpiredSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update expired subscriptions and set paiement to 0';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now()->format('Y-m-d');

        $expiredSubscriptions = Abonnement::where('date_fin', '<', $now)
                                          ->where('paiement', '!=', 0)
                                          ->get();

        foreach ($expiredSubscriptions as $subscription) {
            $subscription->paiement = 0;
            $subscription->save();
        }

        $this->info('Expired subscriptions have been updated successfully.');

        return 0;
    }
}
