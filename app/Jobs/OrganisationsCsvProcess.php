<?php

namespace App\Jobs;

use App\Models\Organisation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class OrganisationsCsvProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->data as $item) {
            $item = explode(',', $item);
            if (count($item) == 10) {
                Organisation::create([
                    'organisation_id' => $item[1],
                    'name' => $item[2] . ',' . $item[3],
                    'website' => $item[4],
                    'country' => $item[5],
                    'description' => $item[6],
                    'founded' => $item[7],
                    'industry' => $item[8],
                    'number_of_employees' => $item[9],
                ]);
            } else {
                Organisation::create([
                    'organisation_id' => $item[1],
                    'name' => $item[2],
                    'website' => $item[3],
                    'country' => $item[4],
                    'description' => $item[5],
                    'founded' => $item[6],
                    'industry' => $item[7],
                    'number_of_employees' => $item[8],
                ]);
            }
        }
    }
}
