<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            [
                'fname' => 'Rosalino',
                'lname' => 'Flores',
                'address' => 'Pinayagan Sur, Tubigon.',
                'email' => 'fross0988@gmail.com',
                'phone_no' => '09388292167',
                'type' => 'Residential Consumer',
            ],
            [
                'fname' => 'Lester',
                'lname' => 'Calunia',
                'address' => 'Guiwanon, Tubigon.',
                'email' => 'calunialester7@gmail.com',
                'phone_no' => '09656292167',
                'type' => 'Residential Consumer',
            ],
            [
                'fname' => 'Altair',
                'lname' => 'Encina',
                'address' => 'Potohan, Tubigon.',
                'email' => 'altenci0812@gmail.com',
                'phone_no' => '09645365167',
                'type' => 'Residential Consumer',
            ],
            [
                'fname' => 'Czerney',
                'lname' => 'Manuyag',
                'address' => 'Pinayagan Sur, Tubigon.',
                'email' => 'czerneytanjuaquiomanuyag@gmail.com',
                'phone_no' => '09382272279',
                'type' => 'Residential Consumer',
            ],
            [
                'fname' => 'Syesha',
                'lname' => 'Manuyag',
                'address' => 'Maca-as, Tubigon.',
                'email' => 'manuyag.syesha.t@gmail.com',
                'phone_no' => '09874567463',
                'type' => 'Residential Consumer',
            ],
            [
                'fname' => 'Ravija Dwayne',
                'lname' => 'Manuyag',
                'address' => 'Tinangnan, Tubigon.',
                'email' => 'ravijadwaynem@gmail.com',
                'phone_no' => '09874567463',
                'type' => 'Residential Consumer',
            ],
            [
                'fname' => 'Rosemarilou',
                'lname' => 'Flores',
                'address' => 'Cangawa, Buenavista',
                'email' => 'rosasmoe@gmail.com',
                'phone_no' => '09974876553',
                'type' => 'Residential Consumer',
            ],
            [
                'fname' => 'Rosalino Sr.',
                'lname' => 'Flores',
                'address' => 'Pooc Oriental, Tubigon',
                'email' => 'rossxkiller123@gmail.com',
                'phone_no' => '09638646853',
                'type' => 'Residential Consumer',
            ],
            [
                'fname' => 'James Christian',
                'lname' => 'Fronteras',
                'address' => 'Panaytayon, Tubigon',
                'email' => 'santiagodebohol@gmail.com',
                'phone_no' => '0947575853',
                'type' => 'Residential Consumer',
            ],
        ];

        foreach($accounts as $acc) {
            Account::create($acc);
        }
    }
}
