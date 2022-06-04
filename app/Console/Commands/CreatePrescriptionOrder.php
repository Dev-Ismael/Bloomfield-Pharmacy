<?php

namespace App\Console\Commands;

use App\Models\Notification;
use App\Models\Prescription;
use Illuminate\Console\Command;
use App\Models\PrescriptionOrder;
use Carbon\Carbon;

class CreatePrescriptionOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prescription:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create prescription_order after finish prescription days';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        // get opened prescription schedule
        $prescriptions = Prescription::where('schedule_orders' , '1')->get();

        foreach( $prescriptions as $prescription ){

            $scheduled_days = $prescription->scheduled_days;
            $schedule_start = $prescription->scheduled_start;

            // renew prescription date
            $renewal_date = date('Y-m-d H:i:s', strtotime($schedule_start . ' +'.$scheduled_days.' day'));
            // today date
            $today_date = date('Y-m-d H:i:s');

            if ($today_date > $renewal_date) {

                // Create prescription order
                $prescription_order = PrescriptionOrder::create([
                    'user_id'         => $prescription->user_id ,
                    'prescription_id' => $prescription->id,
                    'status'          => '0',
                ]);

                // Create notification
                $notification = Notification::create([
                    'user_id'  => $prescription->user_id,
                    'link'     => route('admin.prescription_orders.show', $prescription_order->id),
                    'content'  => "create_prescription_order" ,
                ]);

                // Update Prescription schedule date
                $prescription->update([
                    'scheduled_start' => Carbon::now(),
                ]);

            }

        }

    }
}
