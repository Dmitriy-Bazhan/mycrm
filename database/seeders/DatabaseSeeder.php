<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryData;
use App\Models\Characteristic;
use App\Models\CharacteristicData;
use App\Models\CharacteristicValue;
use App\Models\Product;
use App\Models\ProductData;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $aliases = ['first_category', 'second_category', 'third_category'];

        $names = ['Велосипеды', 'Акссесуары', 'Комплектующие',
            'Подростковые', 'Хардтейлы', 'Гибрид', '1', '2', '3', '4', '5', '6'
        ];

        foreach ($names as $key => $name) {
            $category = new Category;
            $category->alias = \Illuminate\Support\Str::slug($names[$key]);
            if ($key < 3) {
                $parent_id = null;
            }
            if ($key > 2 && $key < 6) {
                $parent_id = 1;
            }
            if ($key > 5 && $key < 9) {
                $parent_id = 2;
            }
            if ($key > 8) {
                $parent_id = 3;
            }
            $category->parent_id = $parent_id;
            $category->save();
            $id = $category->id;

            $languages = ['ua', 'ru'];

            foreach ($languages as $lang) {
                $category_data = new CategoryData;
                $category_data->category_id = $id;
                $category_data->lang = $lang;
                $category_data->name = $names[$key] . ' on ' . strtoupper($lang);
                $category_data->description = $lang . '_' . 'description_' . $names[$key];
                $category_data->save();
            }
        }

        $categories = Category::where('id', '<>', 0)->get();
        $arrayOfCharacteristics = ['First', 'Second', 'Third'];
        $characteristics = ['1-характеристика', '2-характеристика', '3-характеристика'];
        $languages = ['ua', 'ru'];

        foreach ($categories as $category) {
            foreach ($arrayOfCharacteristics as $Ofcharacteristic) {
                $characteristic = new Characteristic;
                $characteristic->category_id = $category->id;
                $characteristic->save();
                $id = $characteristic->id;

                foreach ($languages as $lang) {
                    $data = new CharacteristicData;
                    $data->characteristic_id = $id;
                    $data->lang = $lang;
                    $data->name = $Ofcharacteristic . ' on ' . $lang;
                    $data->save();
                    foreach ($characteristics as $characteristic) {
                        $characteristicValue = new CharacteristicValue;
                        $characteristicValue->characteristic_id = $id;
                        $characteristicValue->lang = $lang;
                        $characteristicValue->value = $characteristic . ' on ' . $lang;
                        $characteristicValue->save();
                    }
                }
            }
        }

                //Products
        for ($i = 1; $i <= 20; $i++) {
            $product = new Product;
            $product->category_id = rand(1, 12);
            $product->alias = 'product_' . $i;
            $product->price_hrn = rand( 30, 85) * 100;
            $product->save();
            $id = $product->id;

            $langs = ['ua', 'ru'];

            foreach ($langs as $lang) {
                $productData = new ProductData;
                $productData->product_id = $id;
                $productData->lang = $lang;
                $productData->model = 'Model of product number ' . $i . ' description on ' . $lang . ' language.';
                $productData->name = 'Product number ' . $i . ' on ' . $lang;
                $productData->description = 'Product number ' . $i . ' description on ' . $lang . ' language.';
                $productData->save();
            }
        }

    }
}
