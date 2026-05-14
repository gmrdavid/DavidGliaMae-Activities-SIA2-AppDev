<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Display all Filipino street food items
    public function index()
    {
       $filstreetfoods = [
    [
        'id'=>1,
        'name'=>'Isaw',
        'description'=>'Grilled chicken intestines on skewers.',
        'price'=>'₱20',
        'category'=>'Grilled',
        'origin'=>'Metro Manila',
        'ingredients'=>'Chicken intestines, marinade, vinegar sauce',
        'calories'=>'180',
        'image'=>'isaw.jpg'
    ],
    [
        'id'=>2,
        'name'=>'Balut',
        'description'=>'Fertilized duck egg boiled and eaten in shell.',
        'price'=>'₱25',
        'category'=>'Exotic',
        'origin'=>'Pateros',
        'ingredients'=>'Duck egg, salt',
        'calories'=>'200',
        'image'=>'balut.jpg'
    ],
    [
        'id'=>3,
        'name'=>'Kwek-kwek',
        'description'=>'Quail eggs coated in orange batter and deep-fried.',
        'price'=>'₱15',
        'category'=>'Fried',
        'origin'=>'Street Vendors Nationwide',
        'ingredients'=>'Quail eggs, flour, food coloring',
        'calories'=>'150',
        'image'=>'kwek-kwek.jpg'
    ],
    [
        'id'=>4,
        'name'=>'Taho',
        'description'=>'Sweetened silken tofu with syrup and sago pearls.',
        'price'=>'₱10',
        'category'=>'Dessert',
        'origin'=>'Manila',
        'ingredients'=>'Tofu, arnibal, sago',
        'calories'=>'120',
        'image'=>'taho.jpg'
    ],
    [
        'id'=>5,
        'name'=>'Fish Balls',
        'description'=>'Skewered fish balls fried and served with sauce.',
        'price'=>'₱20',
        'category'=>'Snack',
        'origin'=>'Street Vendors',
        'ingredients'=>'Fish paste, flour',
        'calories'=>'170',
        'image'=>'fishballs.jpg'
    ],
    [
        'id'=>6,
        'name'=>'Betamax',
        'description'=>'Grilled coagulated chicken blood on sticks.',
        'price'=>'₱15',
        'category'=>'Grilled',
        'origin'=>'Philippines',
        'ingredients'=>'Chicken blood, marinade',
        'calories'=>'160',
        'image'=>'betamax.jpg'
    ],
    [
        'id'=>7,
        'name'=>'Adidas',
        'description'=>'Grilled chicken feet marinated and skewered.',
        'price'=>'₱20',
        'category'=>'Grilled',
        'origin'=>'Philippines',
        'ingredients'=>'Chicken feet, soy sauce',
        'calories'=>'190',
        'image'=>'adidas.jpg'
    ],
    [
        'id'=>8,
        'name'=>'Camote Cue',
        'description'=>'Deep-fried caramelized sweet potato skewers.',
        'price'=>'₱15',
        'category'=>'Sweet Snack',
        'origin'=>'Philippines',
        'ingredients'=>'Sweet potato, sugar',
        'calories'=>'210',
        'image'=>'camotecue.jpg'
    ],
    [
        'id'=>9,
        'name'=>'Banana Cue',
        'description'=>'Deep-fried caramelized saba bananas on sticks.',
        'price'=>'₱15',
        'category'=>'Sweet Snack',
        'origin'=>'Philippines',
        'ingredients'=>'Saba banana, sugar',
        'calories'=>'220',
        'image'=>'bananacue.jpg'
    ],
    [
        'id'=>10,
        'name'=>'Puto Bumbong',
        'description'=>'Purple rice cakes steamed in bamboo.',
        'price'=>'₱25',
        'category'=>'Dessert',
        'origin'=>'Luzon',
        'ingredients'=>'Glutinous rice, coconut',
        'calories'=>'230',
        'image'=>'putobumbong.jpg'
    ],
    [
        'id'=>11,
        'name'=>'Palabok',
        'description'=>'Rice noodles with garlic sauce and toppings.',
        'price'=>'₱40',
        'category'=>'Meal',
        'origin'=>'Philippines',
        'ingredients'=>'Rice noodles, shrimp sauce',
        'calories'=>'300',
        'image'=>'palabok.jpg'
    ],
    [
        'id'=>12,
        'name'=>'Siomai',
        'description'=>'Steamed pork dumplings with sauce.',
        'price'=>'₱25',
        'category'=>'Snack',
        'origin'=>'Chinese-Filipino',
        'ingredients'=>'Pork, wrapper',
        'calories'=>'250',
        'image'=>'siomai.jpg'
    ],
    [
        'id'=>13,
        'name'=>'Halo-Halo',
        'description'=>'Mixed dessert with shaved ice and milk.',
        'price'=>'₱50',
        'category'=>'Dessert',
        'origin'=>'Philippines',
        'ingredients'=>'Ice, milk, beans, fruits',
        'calories'=>'350',
        'image'=>'halohalo.jpg'
    ],
    [
        'id'=>14,
        'name'=>'Churros',
        'description'=>'Deep-fried dough sticks coated with sugar.',
        'price'=>'₱30',
        'category'=>'Snack',
        'origin'=>'Spain/Philippines',
        'ingredients'=>'Flour, sugar',
        'calories'=>'270',
        'image'=>'churros.jpg'
    ],
    [
        'id'=>15,
        'name'=>'Cornick',
        'description'=>'Crunchy toasted corn kernels.',
        'price'=>'₱15',
        'category'=>'Snack',
        'origin'=>'Philippines',
        'ingredients'=>'Corn, salt',
        'calories'=>'140',
        'image'=>'cornick.jpg'
    ],
];

        return view('filstreetfoods.index', compact('filstreetfoods'));
    }

    // Display a single street food item
    public function show($id)
    {
        $filstreetfoods = [
    [
        'id'=>1,
        'name'=>'Isaw',
        'description'=>'Grilled chicken intestines on skewers.',
        'price'=>'₱20',
        'category'=>'Grilled',
        'origin'=>'Metro Manila',
        'ingredients'=>'Chicken intestines, marinade, vinegar sauce',
        'calories'=>'180',
        'image'=>'isaw.jpg'
    ],
    [
        'id'=>2,
        'name'=>'Balut',
        'description'=>'Fertilized duck egg boiled and eaten in shell.',
        'price'=>'₱25',
        'category'=>'Exotic',
        'origin'=>'Pateros',
        'ingredients'=>'Duck egg, salt',
        'calories'=>'200',
        'image'=>'balut.jpg'
    ],
    [
        'id'=>3,
        'name'=>'Kwek-kwek',
        'description'=>'Quail eggs coated in orange batter and deep-fried.',
        'price'=>'₱15',
        'category'=>'Fried',
        'origin'=>'Street Vendors Nationwide',
        'ingredients'=>'Quail eggs, flour, food coloring',
        'calories'=>'150',
        'image'=>'kwek-kwek.jpg'
    ],
    [
        'id'=>4,
        'name'=>'Taho',
        'description'=>'Sweetened silken tofu with syrup and sago pearls.',
        'price'=>'₱10',
        'category'=>'Dessert',
        'origin'=>'Manila',
        'ingredients'=>'Tofu, arnibal, sago',
        'calories'=>'120',
        'image'=>'taho.jpg'
    ],
    [
        'id'=>5,
        'name'=>'Fish Balls',
        'description'=>'Skewered fish balls fried and served with sauce.',
        'price'=>'₱20',
        'category'=>'Snack',
        'origin'=>'Street Vendors',
        'ingredients'=>'Fish paste, flour',
        'calories'=>'170',
        'image'=>'fishballs.jpg'
    ],
    [
        'id'=>6,
        'name'=>'Betamax',
        'description'=>'Grilled coagulated chicken blood on sticks.',
        'price'=>'₱15',
        'category'=>'Grilled',
        'origin'=>'Philippines',
        'ingredients'=>'Chicken blood, marinade',
        'calories'=>'160',
        'image'=>'betamax.jpg'
    ],
    [
        'id'=>7,
        'name'=>'Adidas',
        'description'=>'Grilled chicken feet marinated and skewered.',
        'price'=>'₱20',
        'category'=>'Grilled',
        'origin'=>'Philippines',
        'ingredients'=>'Chicken feet, soy sauce',
        'calories'=>'190',
        'image'=>'adidas.jpg'
    ],
    [
        'id'=>8,
        'name'=>'Camote Cue',
        'description'=>'Deep-fried caramelized sweet potato skewers.',
        'price'=>'₱15',
        'category'=>'Sweet Snack',
        'origin'=>'Philippines',
        'ingredients'=>'Sweet potato, sugar',
        'calories'=>'210',
        'image'=>'camotecue.jpg'
    ],
    [
        'id'=>9,
        'name'=>'Banana Cue',
        'description'=>'Deep-fried caramelized saba bananas on sticks.',
        'price'=>'₱15',
        'category'=>'Sweet Snack',
        'origin'=>'Philippines',
        'ingredients'=>'Saba banana, sugar',
        'calories'=>'220',
        'image'=>'bananacue.jpg'
    ],
    [
        'id'=>10,
        'name'=>'Puto Bumbong',
        'description'=>'Purple rice cakes steamed in bamboo.',
        'price'=>'₱25',
        'category'=>'Dessert',
        'origin'=>'Luzon',
        'ingredients'=>'Glutinous rice, coconut',
        'calories'=>'230',
        'image'=>'putobumbong.jpg'
    ],
    [
        'id'=>11,
        'name'=>'Palabok',
        'description'=>'Rice noodles with garlic sauce and toppings.',
        'price'=>'₱40',
        'category'=>'Meal',
        'origin'=>'Philippines',
        'ingredients'=>'Rice noodles, shrimp sauce',
        'calories'=>'300',
        'image'=>'palabok.jpg'
    ],
    [
        'id'=>12,
        'name'=>'Siomai',
        'description'=>'Steamed pork dumplings with sauce.',
        'price'=>'₱25',
        'category'=>'Snack',
        'origin'=>'Chinese-Filipino',
        'ingredients'=>'Pork, wrapper',
        'calories'=>'250',
        'image'=>'siomai.jpg'
    ],
    [
        'id'=>13,
        'name'=>'Halo-Halo',
        'description'=>'Mixed dessert with shaved ice and milk.',
        'price'=>'₱50',
        'category'=>'Dessert',
        'origin'=>'Philippines',
        'ingredients'=>'Ice, milk, beans, fruits',
        'calories'=>'350',
        'image'=>'halohalo.jpg'
    ],
    [
        'id'=>14,
        'name'=>'Churros',
        'description'=>'Deep-fried dough sticks coated with sugar.',
        'price'=>'₱30',
        'category'=>'Snack',
        'origin'=>'Spain/Philippines',
        'ingredients'=>'Flour, sugar',
        'calories'=>'270',
        'image'=>'churros.jpg'
    ],
    [
        'id'=>15,
        'name'=>'Cornick',
        'description'=>'Crunchy toasted corn kernels.',
        'price'=>'₱15',
        'category'=>'Snack',
        'origin'=>'Philippines',
        'ingredients'=>'Corn, salt',
        'calories'=>'140',
        'image'=>'cornick.jpg'
    ],
];

        $filstreetfood = collect($filstreetfoods)->firstWhere('id', $id);

        return view('filstreetfoods.show', compact('filstreetfood'));
    }
}