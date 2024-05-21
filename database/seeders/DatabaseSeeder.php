<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Vendor;
use App\Models\Discount;
use App\Models\Product;
use App\Models\PaymentMethod;
use App\Models\Attribute;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
            'name'=>'cash',
            'available'=>1
        ]);
        Attribute::create([
            'name' => 'Color',
            'value' => 'red,black,white,yellow,green'
        ]);
        Attribute::create([
            'name' => 'Size',
            'value' => '13,14,15,16,17'
        ]);
        Attribute::create([
            'name' => 'Wireless',
            'value' => 'true,false'
        ]);
        Attribute::create([
            'name' => 'Connectivity',
            'value' => 'BLE,WIFI,USB'
        ]);
        Category::factory()->create([
            'name' => 'Computers & Accessories',
            'image' => '/storage/category/Computers & Accessories.jpg',
        ]);
        Category::factory()->create([
            'name' => 'Mobile Skin Stickers',
            'image' => '/storage/category/Mobile Skin Stickers.jpeg',
        ]);
        Category::factory()->create([
            'name' => 'Power Banks',
            'image' => '/storage/category/Power Banks.jpeg',
        ]);
        Category::factory()->create([
            'name' => 'Wireless Chargers',
            'image' => '/storage/category/Wireless Chargers.jpeg',
        ]);
        Category::factory()->create([
            'name' => 'CPU',
            'image' => '/storage/category/cpu.png',
        ]);
        Category::factory()->create([
            'name' => 'Desktop Screen',
            'image' => '/storage/category/screen.png',
        ]);
        Category::factory()->create([
            'name' => 'Keyboard',
            'image' => '/storage/category/keyboard.png',
        ]);
        Category::factory()->create([
            'name' => 'Mouse',
            'image' => '/storage/category/mouse.png',
        ]);
        Category::factory()->create([
            'name' => 'Printer',
            'image' => '/storage/category/printer.png',
        ]);

        Brand::factory()->count(10)->create();
        Discount::factory()->count(5)->create();
        Vendor::create([
            'name' => 'Shifat',
            'email' => 'shifat@gmail.com',
            'password' => '$2y$10$iKQR5AQWyF2AKmLgwfUS5OEpNE4CNwLJxT56I0Y5WqcKOdhE0n.Ia',
            'mobile'=>'0000000000'
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Logitech Wireless Combo MK270',
            'details' => 'Wireless Keyboard With Mouse',
            'attributes' => '{"1":["1","2"],"3":["0"]}',
            'price' => 1200,
            'quantity' => 10,
            'image' => '/storage/product/Logitech Wireless Combo MK270.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 9,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'HP DeskJet 2755e Wireless Color All-in-One Printer with bonus 6 months Instant Ink with HP+ (26K67A)',
            'details' => 'Printer With high Quality',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1500,
            'quantity' => 7,
            'image' => '/storage/product/HP DeskJet 2755e.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);
        Product::create([
            'category_id' => 7,
            'brand_id' => 1,
            'discount_id' => 1,
            'vendor_id'=>1,
            'name'  => 'Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!',
            'details' => '{Portable KeyBoard Travel Friendly',
            'attributes' => '{"1":["1","2"]}',
            'price' => 1400,
            'quantity' => 2,
            'image' => '/storage/product/Ares Foldable Bluetooth Keyboard - Your Wireless Gadget on The go!.jpg',
        ]);



    }
}
