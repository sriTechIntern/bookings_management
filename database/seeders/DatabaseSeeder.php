<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Property;
use App\Models\Booking;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    

public function run(): void
{
    $rahul = User::create([
        'name' => 'Rahul Sharma',
        'email' => 'rahul@example.com',
        'password' => 'password',
        'role' => 'owner',
    ]);

    $priya = User::create([
        'name' => 'Priya Mehta',
        'email' => 'priya@example.com',
        'password' => 'password',
        'role' => 'owner',
    ]);

    $arjun = User::create([
        'name' => 'Arjun Patel',
        'email' => 'arjun@example.com',
        'password' => 'password',
        'role' => 'owner',
    ]);

    $neha = User::create([
        'name' => 'Neha Joshi',
        'email' => 'neha@example.com',
        'password' => 'password',
        'role' => 'customer',
    ]);

    $rohan = User::create([
        'name' => 'Rohan Iyer',
        'email' => 'rohan@example.com',
        'password' => 'password',
        'role' => 'customer',
    ]);

    $property1 = $rahul->properties()->create([
        'title' => 'Mountain View Villa',
        'description' => 'A spacious villa surrounded by the hills of Lonavala.',
        'location' => 'Lonavala',
        'price' => 8500,
        'max_people_allowed' => 8,
    ]);

    $property2 = $rahul->properties()->create([
        'title' => 'Lakefront Cottage',
        'description' => 'A peaceful cottage overlooking Pawna Lake.',
        'location' => 'Pawna Lake',
        'price' => 6500,
        'max_people_allowed' => 6,
    ]);

    $property3 = $priya->properties()->create([
        'title' => 'Beachside Apartment',
        'description' => 'Modern apartment located close to the beach.',
        'location' => 'Goa',
        'price' => 4500,
        'max_people_allowed' => 4,
    ]);

    $property4 = $priya->properties()->create([
        'title' => 'Sunset Villa',
        'description' => 'Luxury villa with a beautiful sunset view.',
        'location' => 'Candolim, Goa',
        'price' => 9000,
        'max_people_allowed' => 10,
    ]);

    $property5 = $arjun->properties()->create([
        'title' => 'Cozy Hill House',
        'description' => 'Comfortable hill house surrounded by greenery.',
        'location' => 'Mahabaleshwar',
        'price' => 5500,
        'max_people_allowed' => 6,
    ]);

    $property6 = $arjun->properties()->create([
        'title' => 'Forest Retreat',
        'description' => 'Quiet retreat surrounded by forest.',
        'location' => 'Matheran',
        'price' => 4000,
        'max_people_allowed' => 5,
    ]);

    $neha->bookings()->create([
        'booking_date' => '2026-10-05',
        'people_count' => 4,
        'property_id' => $property1->id,
    ]);

    $rohan->bookings()->create([
        'booking_date' => '2026-10-12',
        'people_count' => 2,
        'property_id' => $property2->id,
    ]);

    $neha->bookings()->create([
        'booking_date' => '2026-10-20',
        'people_count' => 3,
        'property_id' => $property3->id,
    ]);

    $rohan->bookings()->create([
        'booking_date' => '2026-11-02',
        'people_count' => 8,
        'property_id' => $property4->id,
    ]);

    $neha->bookings()->create([
        'booking_date' => '2026-11-15',
        'people_count' => 5,
        'property_id' => $property5->id,
    ]);

    $rohan->bookings()->create([
        'booking_date' => '2026-11-20',
        'people_count' => 2,
        'property_id' => $property6->id,
    ]);
}
}

