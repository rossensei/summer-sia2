<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Billing;
use Carbon\Carbon;

class BillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfAccounts = 9;

        $firstMonthBillings = [];

        for ($i = 1; $i <= $numberOfAccounts; $i++) {
            $billingDate = '2023-07-15';
            $kwhUsed = fake()->randomElement(range(5, 999));
            $rate = fake()->randomFloat(3, 9, 20);
            $amount = $kwhUsed * $rate;
            $vat = fake()->randomFloat(2, 100, 300);
            $dueDate = Carbon::parse($billingDate)->addDays(20);
            $status = 'Paid';

            $firstMonthBillings[] = [
                'account_id' => $i,
                'billing_date' => $billingDate,
                'kwh_used' => $kwhUsed,
                'rate' => $rate,
                'amount' => $amount,
                'vat' => $vat,
                'due_date' => $dueDate,
                'status' => $status,
            ];
        }

        foreach($firstMonthBillings as $b) {
            Billing::create($b);
        }

        $secondMonthBilling = [];

        for ($i = 1; $i <= $numberOfAccounts; $i++) {
            $billingDate = '2023-08-15';
            $kwhUsed = fake()->randomElement(range(5, 999));
            $rate = fake()->randomFloat(3, 9, 20);
            $amount = $kwhUsed * $rate;
            $vat = fake()->randomFloat(2, 100, 300);
            $dueDate = Carbon::parse($billingDate)->addDays(20);
            $status = 'Paid';

            $secondMonthBilling[] = [
                'account_id' => $i,
                'billing_date' => $billingDate,
                'kwh_used' => $kwhUsed,
                'rate' => $rate,
                'amount' => $amount,
                'vat' => $vat,
                'due_date' => $dueDate,
                'status' => $status,
            ];
        }

        foreach($secondMonthBilling as $b) {
            Billing::create($b);
        }

        $thirdMonthBilling = [];

        for ($i = 1; $i <= $numberOfAccounts; $i++) {
            $billingDate = '2023-09-15';
            $kwhUsed = fake()->randomElement(range(5, 999));
            $rate = fake()->randomFloat(3, 9, 20);
            $amount = $kwhUsed * $rate;
            $vat = fake()->randomFloat(2, 100, 300);
            $dueDate = Carbon::parse($billingDate)->addDays(20);
            $status = fake()->randomElement(['Paid', 'Paid', 'Paid', 'Pending']);

            $thirdMonthBilling[] = [
                'account_id' => $i,
                'billing_date' => $billingDate,
                'kwh_used' => $kwhUsed,
                'rate' => $rate,
                'amount' => $amount,
                'vat' => $vat,
                'due_date' => $dueDate,
                'status' => $status
            ];
        }

        foreach($thirdMonthBilling as $b) {
            Billing::create($b);
        }
    }
}
