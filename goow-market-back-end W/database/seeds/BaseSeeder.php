<?php

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use App\Models\Unit;
use App\Models\Activity;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'name' => 'Paris',
            ],
            [
                'name' => 'Montreuil',
            ],
            [
                'name' => 'Romainville',
            ],
            [
                'name' => 'Les Lilas',
            ],
            [
                'name' => 'Bagnolet',
            ],
            [
                'name' => 'St-Maur',
            ],
        ];
        $activities = [
            [
                'title' => 'Vêtement',
                'icon' => 'images/shop-category/Vetement.png',
                'color' => '#a9dbc5',
            ],
            [
                'title' => 'Réparation  Mobile',
                'icon' => 'images/shop-category/ReparationMobile.png',
                'color' => '#d1a469',
            ],
            [
                'title' => 'Boulanger',
                'icon' => 'images/merchant-category/bakery.png',
                'color' => '#fee6c0',
            ],
            [
                'title' => 'Boucher',
                'icon' => 'images/merchant-category/meet.png',
                'color' => '#fedce6',
            ],
            [
                'title' => 'Poissonerie',
                'icon' => 'images/merchant-category/fish.png',
                'color' => '#b9dae8',
            ],
            [
                'title' => 'Primeurs fruits & légumes',
                'icon' => 'images/merchant-category/fruit.png',
                'color' => '#fee6c0',
            ],
            [
                'title' => 'Fromager',
                'icon' => 'images/merchant-category/cheese.png',
                'color' => '#fedce6',
            ],
            [
                'title' => 'Fleuriste',
                'icon' => 'images/merchant-category/florist.png',
                'color' => '#b9dae8',
            ],
            [
                'title' => 'Other',
                'icon' => '',
                'color' => '#fff',
            ],
        ];
        $product_categories = ['Pains Blancs', 'Pains Complets', 'Pains Fruits', 'Viennoiseries', 'Gateaux', 'Spécial', 'Pains Blancs', 'Pains Complets', ];
        $units = [
            [
                'unit' => 'Kg',
            ],
            [
                'unit' => 'g',
            ],
            [
                'unit' => 'L',
            ],
            [
                'unit' => 'mL',
            ],
            [
                'unit' => 'pièces',
            ],
        ];
        $products = [
            [
                'title' => 'Pain Céréales',
                'description' => '500g - (7,90€/KG)',
                'price' => 5,
                'unit_id' => '4',
                'unit_quantity' => '1',
                'image' => 'images/products/product-' . rand(1, 3) . '.png',
            ],
            [
                'title' => 'Pain Céréales',
                'description' => '500g - (7,90€/KG)',
                'price' => 5,
                'unit_id' => '4',
                'unit_quantity' => '1',
                'image' => 'images/products/product-' . rand(1, 3) . '.png',
            ],
            [
                'title' => 'Pain Céréales',
                'description' => '500g - (7,90€/KG)',
                'price' => 5,
                'unit_id' => '4',
                'unit_quantity' => '1',
                'image' => 'images/products/product-' . rand(1, 3) . '.png',
            ],
            [
                'title' => 'Pain Céréales',
                'description' => '500g - (7,90€/KG)',
                'price' => 5,
                'unit_id' => '4',
                'unit_quantity' => '1',
                'image' => 'images/products/product-' . rand(1, 3) . '.png',
            ],
            [
                'title' => 'Pain Céréales',
                'description' => '500g - (7,90€/KG)',
                'price' => 5,
                'unit_id' => '4',
                'unit_quantity' => '1',
                'image' => 'images/products/product-' . rand(1, 3) . '.png',
            ],
            [
                'title' => 'Pain Céréales',
                'description' => '500g - (7,90€/KG)',
                'price' => 5,
                'unit_id' => '4',
                'unit_quantity' => '1',
                'image' => 'images/products/product-' . rand(1, 3) . '.png',
            ],
            [
                'title' => 'Pain Céréales',
                'description' => '500g - (7,90€/KG)',
                'price' => 5,
                'unit_id' => '4',
                'unit_quantity' => '1',
                'image' => 'images/products/product-' . rand(1, 3) . '.png',
            ],
            [
                'title' => 'Pain Céréales',
                'description' => '500g - (7,90€/KG)',
                'price' => 5,
                'unit_id' => '4',
                'unit_quantity' => '1',
                'image' => 'images/products/product-' . rand(1, 3) . '.png',
            ],
            [
                'title' => 'Pain Céréales',
                'description' => '500g - (7,90€/KG)',
                'price' => 5,
                'unit_id' => '4',
                'unit_quantity' => '1',
                'image' => 'images/products/product-' . rand(1, 3) . '.png',
            ],
            [
                'title' => 'Pain Céréales',
                'description' => '500g - (7,90€/KG)',
                'price' => 5,
                'unit_id' => '4',
                'unit_quantity' => '1',
                'image' => 'images/products/product-' . rand(1, 3) . '.png',
            ],
        ];
        $events = [
            [   'id'    => 0,
                'title' => 'Fermeture Anuelle A',
                'slug' => Str::slug('Fermeture Anuelle'),
                'description' => 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem. Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem.',
                'content' => '',
            ],
            [
                'id'    => 1,
                'title' => 'Marché de Noël B',
                'slug' => Str::slug('Marché de Noël'),
                'description' => 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem. Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem.',
                'content' => '',
            ],
            [
                'id'    => 2,
                'title' => 'Halloween A',
                'slug' => Str::slug('Halloween'),
                'description' => 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem. Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem.',
                'content' => '',
            ],
            [
                'id'    =>3,
                'title' => 'Fermeture Anuelle 2 B',
                'slug' => Str::slug('Fermeture Anuelle 2'),
                'description' => 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem. Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem.',
                'content' => '',
            ],
            [
                'id'    => 4,
                'title' => 'Marché de Noël A',
                'slug' => Str::slug('Marché de Noël 2'),
                'description' => 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem. Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem.',
                'content' => '',
            ],
            [
                'id'    => 5,
                'title' => 'Halloween B',
                'slug' => Str::slug('Halloween 2'),
                'description' => 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem. Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem.',
                'content' => '',
            ],
            [   'id'    => 6,
                'title' => 'Fermeture Anuelle A',
                'slug' => Str::slug('Fermeture Anuelle'),
                'description' => 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem. Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem.',
                'content' => '',
            ],
            [
                'id'    => 7,
                'title' => 'Marché de Noël B',
                'slug' => Str::slug('Marché de Noël'),
                'description' => 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem. Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem.',
                'content' => '',
            ],
            [
                'id'    => 8,
                'title' => 'Halloween A',
                'slug' => Str::slug('Halloween'),
                'description' => 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem. Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem.',
                'content' => '',
            ],
            [
                'id'    =>9,
                'title' => 'Fermeture Anuelle 2 B',
                'slug' => Str::slug('Fermeture Anuelle 2'),
                'description' => 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem. Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem.',
                'content' => '',
            ],
            [
                'id'    => 10,
                'title' => 'Marché de Noël A',
                'slug' => Str::slug('Marché de Noël 2'),
                'description' => 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem. Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem.',
                'content' => '',
            ],
            [
                'id'    => 11,
                'title' => 'Halloween B',
                'slug' => Str::slug('Halloween 2'),
                'description' => 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem. Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem.',
                'content' => '',
            ],
        ];
        $stripe_accounts = ['acct_1Ib3uqPeJ99WQOlD', 'acct_1Ib49KPjYH4DfwBW',];
        $merchant_statuses = ['PENDING', 'CONFIRMED', 'REJECTED',];

        foreach ($activities as $activity) {
            Activity::create([
                'title' => $activity['title'],
                'icon' => $activity['icon'],
                'color' => $activity['color'],
            ]);
        }

        foreach ($product_categories as $category) {
            ProductCategory::create([
                'title' => $category,
                'merchant_id' => 1,
            ]);
        }

        foreach ($units as $unit) {
            Unit::create([
                'unit' => $unit['unit'],
            ]);
        }

        foreach ($cities as $city) {
            $city = City::create([
                'name' => $city['name'],
                'slug' => Str::slug($city['name']),
                'image' => 'images/city/paris.png',
                'location' => '{}',
                'postal_code' => '123',
            ]);

            for ($i = 0; $i < 12; $i++) {
                $market = $city->markets()->create([
                    'title' => "Marché Exelmans-$i",
                    'slug' => Str::slug('Marché Exelmans-' . $i . rand(999, 999999)),
                    'address' => '{}',
                    'description' => 'On y trouve les activités de bouche traditionnelles offertes par les tripiers, volaillers, bouchers, charcutiers, poissonniers, fromagers et bien-sûr la vente de primeurs (fruits et légumes, dont certains bénéficient du label bio).',
                    'image' => 'images/market/market.png',
                    'user_id' => 1,
                ]);

                $shop = $city->shops()->create([
                    'title' => "ShopController-$i",
                    'slug' => Str::slug('ShopController-' . $i . rand(999, 999999)),
                    'address' => '{}',
                    'description' => 'On y trouve les activités de bouche traditionnelles offertes par les tripiers, volaillers, bouchers, charcutiers, poissonniers, fromagers et bien-sûr la vente de primeurs (fruits et légumes, dont certains bénéficient du label bio).',
                    'image' => 'images/shops/shop.png',
                    'activity_id' => rand(1, 6),
                ]);


                for ($j = 0; $j < 12; $j++) {
                    $merchant = $market->merchants()->create([
                        'title' => "Example merchant-$j",
                        'slug' => Str::slug('Example merchant-' . $j . rand(999, 999999)),
                        'address' => 'Example address',
                        'image' => 'images/merchant/shop.png',
                        'description' => 'Example description',
                        'email' => 'example@mail.com',
                        'phone' => '0621234567',
                        'status' => $merchant_statuses[rand(0, 2)],
                        'stripe_acc_id' => $stripe_accounts[rand(0, 1)],
                        'activity_id' => rand(3, 6),
                        'user_id' => 1,
                    ]);
                
                foreach ($events as $event) {
                    if ($event['id']%2 == 1) {
                        $market->events()->create([
                            'title' => $event['title'],
                            'slug' => $event['slug'] . Str::random(16),
                            'description' => $event['description'],
                            'content' => $event['content'],
                        ]);
                    } else {
                        $merchant->events()->create([
                            'title' => $event['title'],
                            'slug' => $event['slug'] . Str::random(16),
                            'description' => $event['description'],
                            'content' => $event['content'],
                        ]);
                    }
                }
                    foreach ($products as $product) {
                        $merchant->products()->create([
                            'title' => $product['title'],
                            'description' => $product['description'],
                            'price' => $product['price'],
                            'unit_id' => $product['unit_id'],
                            'unit_quantity' => $product['unit_quantity'],
                            'image' => $product['image'],
                            'product_category_id' => rand(1, 8),
                        ]);

                        $shop->products()->create([
                            'title' => $product['title'],
                            'description' => $product['description'],
                            'price' => $product['price'],
                            'unit_id' => $product['unit_id'],
                            'unit_quantity' => $product['unit_quantity'],
                            'image' => $product['image'],
                            'product_category_id' => rand(1, 8),
                        ]);
                    }
                }
            }
        }

        \App\Models\Market::whereId(1)->update(['user_id' => 3]);
    }
}
