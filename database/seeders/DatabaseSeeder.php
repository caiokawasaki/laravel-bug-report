<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Environment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $environment = Environment::create([
            'name' => 'Company Name'
        ]);

        $environment->invoices()->create([
            'pre_paid_received_messages' => rand(1000000, 10000000),
            'post_paid_received_messages' => rand(1000000, 10000000),
            'pre_paid_sent_messages' => rand(1000000, 10000000),
            'post_paid_sent_messages' => rand(1000000, 10000000),
        ]);

        $environment->invoices()->create([
            'pre_paid_received_messages' => rand(1000000, 10000000),
            'post_paid_received_messages' => rand(1000000, 10000000),
            'pre_paid_sent_messages' => rand(1000000, 10000000),
            'post_paid_sent_messages' => rand(1000000, 10000000),
        ]);

        $environment->invoices()->create([
            'pre_paid_received_messages' => rand(1000000, 10000000),
            'post_paid_received_messages' => rand(1000000, 10000000),
            'pre_paid_sent_messages' => rand(1000000, 10000000),
            'post_paid_sent_messages' => rand(1000000, 10000000),
        ]);

        $environment->invoices()->create([
            'pre_paid_received_messages' => rand(1000000, 10000000),
            'post_paid_received_messages' => rand(1000000, 10000000),
            'pre_paid_sent_messages' => rand(1000000, 10000000),
            'post_paid_sent_messages' => rand(1000000, 10000000),
        ]);
    }
}
