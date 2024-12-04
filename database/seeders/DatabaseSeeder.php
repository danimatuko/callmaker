<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Create agents
        \App\Models\Agent::factory(5)->create()->each(function ($agent) {
            // Create customers for each agent
            $agent->customers()->saveMany(\App\Models\Customer::factory(10)->make())
                ->each(function ($customer) use ($agent) {
                    // Create calls for each customer
                    $customer->calls()->saveMany(\App\Models\Call::factory(3)->make([
                        'agent_id' => $agent->id,
                    ]));
                });
        });
    }
}
