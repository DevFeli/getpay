<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::transaction(function () {
            Role::insert([
                ['name' => 'basic', 'code' => 1, 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')],
                ['name' => 'professional', 'code' => 2, 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')],
                ['name' => 'expert', 'code' => 3, 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')],

                ['name' => 'admin', 'code' => 4, 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')],
                ['name' => 'owner', 'code' => 5, 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')],
            ]);

            PaymentMethod::create([
                'method_type' => 'credit_card',
            ]);
            
            $user = User::create([
                'name' => 'Owner',
                'email' => 'owner@admin.com',
                'password' => Hash::make('12345678'),
                'cpf' => '12345678911',
                'birthday' => '1993-02-28',
                'active' => 1,
                'phone_number' => '11 99409-3752',
                'role_code' => 5,
            ]);

            $userWallet = $user->wallets()->create([
                'user_id' => $user->id,
                'description' => 'Plano básico',
            ]);

            $admin = User::create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('12345678'),
                'cpf' => '12345678912',
                'birthday' => '1993-02-28',
                'active' => 1,
                'phone_number' => '11 99409-3752',
                'role_code' => 4,
            ]);

            $userWallet->users()->attach($admin->id);

            $adminWallet = $admin->wallets()->create([
                'user_id' => $admin->id,
                'description' => 'Plano básico',
            ]);

            $client = User::create([
                'name' => 'admin',
                'email' => 'client@admin.com',
                'password' => Hash::make('12345678'),
                'cpf' => '12345678913',
                'birthday' => '1993-02-28',
                'active' => 1,
                'phone_number' => '11 99409-3752',
                'role_code' => 1,
            ]);

            $adminWallet->users()->attach($client->id);

            $address = [
                'street' => 'R, Ana Ferreira',
                'number' => 123,
                'complement' => 'casa A',
                'neighborhood' => 'Brás Cubaz',
                'city' => 'Mogi das Cruzes',
                'state' => 'SP',
                'zip_code' => '08730340',
                'country' => 'Brazil',
            ];

            $user->address()->create($address);
            $admin->address()->create($address);
            $client->address()->create($address);

            $plan = [
                'name' => 'teste',
                'description' => 'Plano basico para teste',
                'price' => 9.99,
                'billing_cicly' => 'monthly',
            ];

            $user->plans()->create($plan);
            $admin->plans()->create($plan);
            $client->plans()->create($plan);

            $userSub = $user->subscriptions()->create([
                'plan_id' => 1,
                'status' => 'active',
                'type' => 'monthly',
                'start' => date('Y-m-d'),
                'end' => date('Y-m-d'),
            ]);

            $userSub->payments()->create([
                'payment_date' => date('Y-m-d'),
                'amount' => 9.99,
                'status' => true,
                'payment_method_id' => 1,
            ]);

            $adminSub = $admin->subscriptions()->create([
                'plan_id' => 1,
                'status' => 'active',
                'type' => 'monthly',
                'start' => date('Y-m-d'),
                'end' => date('Y-m-d'),
            ]);

            $adminSub->payments()->create([
                'payment_date' => date('Y-m-d'),
                'amount' => 9.99,
                'status' => true,
                'payment_method_id' => 1,
            ]);

            $clientSub = $client->subscriptions()->create([
                'plan_id' => 1,
                'status' => 'active',
                'type' => 'monthly',
                'start' => date('Y-m-d'),
                'end' => date('Y-m-d'),
            ]);

            $clientSub->payments()->create([
                'payment_date' => date('Y-m-d'),
                'amount' => 9.99,
                'status' => true,
                'payment_method_id' => 1,
            ]);
        });
    }
}
