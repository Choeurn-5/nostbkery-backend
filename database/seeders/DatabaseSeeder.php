<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SiteSetting;
use App\Models\AnnouncementBar;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Promotion;
use App\Models\WholesaleSetting;
use App\Models\WholesaleStep;
use App\Models\Location;
use App\Models\StoryBlock;
use App\Models\FaqItem;
use App\Models\Testimonial;
use App\Models\HomeSection;
use App\Models\PageSeo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Users
        User::updateOrCreate(
            ['email' => 'owner@nostbakery.com'],
            [
                'name' => 'NOST Owner',
                'password' => Hash::make('nost2024!'),
                'role' => 'OWNER',
                'active' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'editor@nostbakery.com'],
            [
                'name' => 'NOST Editor',
                'password' => Hash::make('editor2024!'),
                'role' => 'EDITOR',
                'active' => true,
            ]
        );

        // 2. Site Settings
        SiteSetting::updateOrCreate(
            ['id' => 'default'],
            [
                'phone_numbers' => ['060 731 888', '099 200 076'],
                'email' => 'info@nostbakery.com',
                'telegram_link' => 'https://t.me/NostBakery',
                'facebook_link' => 'https://www.facebook.com/NOSTBakeryPastry',
                'website_url' => 'nostbakery.com',
                'address_en' => 'Angkor Mansion & Residence, Siem Reap, Cambodia',
                'address_km' => 'អង់គរ ម៉េនសិន & រេស៊ីដិនស៍, សៀមរាប, កម្ពុជា',
                'seo_title_en' => 'NOST Bakery & Pastry — Fresh Bakery in Siem Reap, Cambodia',
                'seo_title_km' => 'NOST Bakery & Pastry — នំប៉័ង និង នំផេស្ត្រី ស្រស់ៗ នៅសៀមរាប',
                'seo_description_en' => 'Fresh bread, pastries, cakes and desserts in Siem Reap, Cambodia. Café, takeaway and wholesale frozen bakery supply.',
                'seo_description_km' => 'នំប៉័ង នំផេស្ត្រី នំខេក និងបង្អែមស្រស់ៗរៀងរាល់ថ្ងៃនៅសៀមរាប។ មានកាហ្វេ វេចខ្ចប់ និងផ្គត់ផ្គង់នំប៉័ងក្លាស្សេលក់ដុំ។',
                'cookie_notice_text_en' => 'We use cookies to improve your experience. By continuing, you agree to our use of cookies.',
                'cookie_notice_text_km' => 'យើងប្រើប្រាស់ cookies ដើម្បីកែលម្អបទពិសោធន៍របស់អ្នក។ ដោយបន្តប្រើប្រាស់ អ្នកយល់ព្រមនឹងការប្រើប្រាស់ cookies របស់យើង។',
                'footer_text_en' => 'Baked with love in Siem Reap.',
                'footer_text_km' => 'ដុតនំដោយក្តីស្រឡាញ់នៅសៀមរាប។',
            ]
        );

        // 3. Announcement Bar
        AnnouncementBar::updateOrCreate(
            ['id' => 'default'],
            [
                'text_en' => 'Buy 1 Get 1 Free · Every day 6:00 PM – 9:00 PM',
                'text_km' => 'ទិញ ១ ថែម ១ ឥតគិតថ្លៃ · រៀងរាល់ថ្ងៃ ម៉ោង ៦:០០ ល្ងាច – ៩:០០ យប់',
                'link' => '/promotions',
                'is_active' => true,
            ]
        );

        // 4. Categories
        $categories = [
            [
                'slug' => 'croissants-pastries',
                'name_en' => 'Croissants & Pastries',
                'name_km' => 'ក្រូសង់ និង នំផេស្ត្រី',
                'image' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=800&q=80',
                'image_alt_en' => 'Freshly baked French croissants and pastries',
                'image_alt_km' => 'ក្រូសង់ និងនំផេស្ត្រីដុតថ្មីៗ',
                'is_visible' => true,
                'sort_order' => 1,
            ],
            [
                'slug' => 'breads',
                'name_en' => 'Breads',
                'name_km' => 'នំប៉័ង',
                'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=800&q=80',
                'image_alt_en' => 'Rustic sourdough loaves and French baguettes',
                'image_alt_km' => 'នំប៉័ងសួរដូ និងបាហ្គែតស្រស់ៗ',
                'is_visible' => true,
                'sort_order' => 2,
            ],
            [
                'slug' => 'cakes',
                'name_en' => 'Cakes',
                'name_km' => 'នំខេក',
                'image' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=800&q=80',
                'image_alt_en' => 'Celebration cakes and gourmet dessert slices',
                'image_alt_km' => 'នំខេកខួបកំណើត និងនំខេកកាត់ដុំ',
                'is_visible' => true,
                'sort_order' => 3,
            ],
            [
                'slug' => 'desserts-tiramisu',
                'name_en' => 'Desserts & Tiramisu',
                'name_km' => 'បង្អែម និង ទីរ៉ាមីស៊ូ',
                'image' => 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?auto=format&fit=crop&w=800&q=80',
                'image_alt_en' => 'Authentic Italian tiramisu and chilled specialties',
                'image_alt_km' => 'ទីរ៉ាមីស៊ូអ៊ីតាលី និងបង្អែមត្រជាក់ៗ',
                'is_visible' => true,
                'sort_order' => 4,
            ],
            [
                'slug' => 'drinks',
                'name_en' => 'Drinks',
                'name_km' => 'ភេសជ្ជៈ',
                'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&w=800&q=80',
                'image_alt_en' => 'Barista specialty espresso and cold craft drinks',
                'image_alt_km' => 'កាហ្វេ espresso ឡាតេ និងភេសជ្ជៈត្រជាក់',
                'is_visible' => true,
                'sort_order' => 5,
            ],
            [
                'slug' => 'frozen-bakery',
                'name_en' => 'Frozen Bakery',
                'name_km' => 'នំប៉័ងក្លាស្សេ',
                'image' => 'https://images.unsplash.com/photo-1530610476181-d83430b64dcd?auto=format&fit=crop&w=800&q=80',
                'image_alt_en' => 'Raw frozen croissants and ready-to-bake wholesale goods',
                'image_alt_km' => 'ក្រូសង់ក្លាស្សេឆៅ និងនំសម្រាប់ដុតលក់ដុំ',
                'is_visible' => true,
                'sort_order' => 6,
            ],
        ];

        $catMap = [];
        foreach ($categories as $cat) {
            $record = Category::updateOrCreate(['slug' => $cat['slug']], $cat);
            $catMap[$cat['slug']] = $record->id;
        }

        // 5. Products
        $products = [
            [
                'category_slug' => 'croissants-pastries',
                'slug' => 'classic-butter-croissant',
                'name_en' => 'Classic Butter Croissant',
                'name_km' => 'ក្រូសង់ប៊ឺរបារាំងបុរាណ',
                'description_en' => 'Flaky, golden-brown French butter croissant layered with rich Normandy-style butter and baked fresh daily.',
                'description_km' => 'ក្រូសង់ប៊ឺរបារាំងស្រួយស្រទាប់ ឈ្ងុយឆ្ងាញ់ ដុតថ្មីៗជារៀងរាល់ថ្ងៃ។',
                'price' => 2.50,
                'compare_at_price' => 3.00,
                'badges' => ['BEST_SELLER', 'FEATURED'],
                'availability' => 'AVAILABLE',
                'channel_tags' => ['RETAIL'],
                'is_featured' => true,
                'sort_order' => 1,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Golden crispy French butter croissant',
                'image_alt_km' => 'ក្រូសង់ប៊ឺរបារាំងស្រទាប់ស្រួយពណ៌មាស',
            ],
            [
                'category_slug' => 'croissants-pastries',
                'slug' => 'pain-au-chocolat',
                'name_en' => 'Pain au Chocolat',
                'name_km' => 'នំផេនអូសូកូឡា',
                'description_en' => 'Laminated croissant dough wrapped around two batons of rich dark chocolate, baked to crispy perfection.',
                'description_km' => 'នំផេស្ត្រីស្រទាប់ស្រួយរុំជាមួយសូកូឡាខ្មៅពីរដើម ដុតយ៉ាងឈ្ងុយឆ្ងាញ់។',
                'price' => 3.00,
                'compare_at_price' => null,
                'badges' => ['FEATURED'],
                'availability' => 'AVAILABLE',
                'channel_tags' => ['RETAIL'],
                'is_featured' => true,
                'sort_order' => 2,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1530610476181-d83430b64dcd?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Flaky Pain au Chocolat with dark chocolate filling',
                'image_alt_km' => 'នំផេនអូសូកូឡាស្រទាប់ស្រួយ',
            ],
            [
                'category_slug' => 'croissants-pastries',
                'slug' => 'almond-croissant',
                'name_en' => 'Almond Croissant',
                'name_km' => 'ក្រូសង់អាល់ម៉ុន',
                'description_en' => 'Twice-baked croissant filled with rich almond frangipane cream and topped with toasted sliced almonds and powdered sugar.',
                'description_km' => 'ក្រូសង់ដុតពីរដង បំពេញដោយក្រែមអាល់ម៉ុន ស្រោបដោយបន្ទះអាល់ម៉ុនលីង និងម្សៅស្ករ។',
                'price' => 3.50,
                'compare_at_price' => null,
                'badges' => ['NEW'],
                'availability' => 'AVAILABLE',
                'channel_tags' => ['RETAIL'],
                'is_featured' => false,
                'sort_order' => 3,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Toasted almond croissant with frangipane cream',
                'image_alt_km' => 'ក្រូសង់អាល់ម៉ុនដុតពីរដងជាមួយក្រែមអាល់ម៉ុន',
            ],
            [
                'category_slug' => 'cakes',
                'slug' => 'durian-cream-cake',
                'name_en' => 'Durian Cream Cake',
                'name_km' => 'នំខេកសាច់ទុរេនកំពត',
                'description_en' => 'Light and airy chiffon sponge infused with premium Kampot durian puree and velvety fresh cream.',
                'description_km' => 'នំខេកស្ពោតស្រាល បំពេញដោយសាច់ទុរេនកំពតសុទ្ធ និងក្រែមស្រស់ឈ្ងុយឆ្ងាញ់។',
                'price' => 15.00,
                'compare_at_price' => 18.00,
                'badges' => ['NEW', 'FEATURED'],
                'availability' => 'AVAILABLE',
                'channel_tags' => ['RETAIL'],
                'is_featured' => true,
                'sort_order' => 4,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Specialty Durian Cream Cake made with fresh Kampot durian',
                'image_alt_km' => 'នំខេកសាច់ទុរេនកំពតពិសេសរសជាតិឈ្ងុយឆ្ងាញ់',
            ],
            [
                'category_slug' => 'desserts-tiramisu',
                'slug' => 'classic-tiramisu',
                'name_en' => 'Classic Tiramisu',
                'name_km' => 'ទីរ៉ាមីស៊ូបុរាណ',
                'description_en' => 'Traditional Italian tiramisu layered with espresso-soaked savoiardi ladyfingers and creamy mascarpone sabayon.',
                'description_km' => 'ទីរ៉ាមីស៊ូបែបអ៊ីតាលីប្រពៃណី ផ្សំជាមួយនំស្រួយជ្រលក់កាហ្វេ espresso និងក្រែម mascarpone។',
                'price' => 5.50,
                'compare_at_price' => null,
                'badges' => ['BEST_SELLER', 'FEATURED'],
                'availability' => 'AVAILABLE',
                'channel_tags' => ['RETAIL'],
                'is_featured' => true,
                'sort_order' => 5,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Decadent Italian tiramisu topped with cocoa powder',
                'image_alt_km' => 'ទីរ៉ាមីស៊ូអ៊ីតាលីស្រោបដោយម្សៅកាកាវ',
            ],
            [
                'category_slug' => 'breads',
                'slug' => 'sourdough-bread',
                'name_en' => 'Sourdough Bread',
                'name_km' => 'នំប៉័ងសួរដូធម្មជាតិ',
                'description_en' => 'Naturally fermented artisanal sourdough with a blistered crunchy crust and an open, chewy crumb.',
                'description_km' => 'នំប៉័ងសួរដូធ្វើដោយដៃ ផ្អាប់ដោយមេធម្មជាតិ សំបកស្រួយ និងទន់ស្វិតខាងក្នុង។',
                'price' => 4.00,
                'compare_at_price' => null,
                'badges' => [],
                'availability' => 'AVAILABLE',
                'channel_tags' => ['RETAIL'],
                'is_featured' => false,
                'sort_order' => 6,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1589367920969-ab8e050bbb04?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Crusty rustic sourdough loaf',
                'image_alt_km' => 'នំប៉័ងសួរដូធម្មជាតិសំបកស្រួយ',
            ],
            [
                'category_slug' => 'breads',
                'slug' => 'baguette',
                'name_en' => 'Baguette',
                'name_km' => 'នំប៉័ងបាហ្គែតបារាំង',
                'description_en' => 'Classic French baguette with crisp golden crust and honeycomb aeration, baked several times a day.',
                'description_km' => 'បាហ្គែតបារាំងបុរាណ សំបកស្រួយពណ៌មាស និងសាច់នំទន់ស្ពោត ដុតច្រើនដងក្នុងមួយថ្ងៃ។',
                'price' => 2.00,
                'compare_at_price' => null,
                'badges' => ['FEATURED'],
                'availability' => 'AVAILABLE',
                'channel_tags' => ['RETAIL'],
                'is_featured' => true,
                'sort_order' => 7,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Traditional crispy French baguette',
                'image_alt_km' => 'បាហ្គែតបារាំងស្រួយពណ៌មាស',
            ],
            [
                'category_slug' => 'cakes',
                'slug' => 'red-velvet-cake',
                'name_en' => 'Red Velvet Cake',
                'name_km' => 'នំខេក Red Velvet',
                'description_en' => 'Decadent cocoa-scented crimson cake layered with tangy cream cheese frosting.',
                'description_km' => 'នំខេកក្រហមក្រលៃរសជាតិកាកាវ ញាំជាមួយក្រែមឈីសទន់ល្មើយ។',
                'price' => 18.00,
                'compare_at_price' => null,
                'badges' => [],
                'availability' => 'AVAILABLE',
                'channel_tags' => ['RETAIL'],
                'is_featured' => false,
                'sort_order' => 8,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1616541823729-00fe0aacd32c?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Rich Red Velvet celebration cake with cream cheese swirl',
                'image_alt_km' => 'នំខេក Red Velvet ជាមួយក្រែមឈីស',
            ],
            [
                'category_slug' => 'drinks',
                'slug' => 'iced-latte',
                'name_en' => 'Iced Latte',
                'name_km' => 'កាហ្វេឡាតេទឹកកក',
                'description_en' => 'Double shot of rich espresso poured over chilled fresh milk and served over ice.',
                'description_km' => 'កាហ្វេ espresso ពីរផ្លោះ ផ្សំជាមួយទឹកដោះគោស្រស់ត្រជាក់ និងទឹកកក។',
                'price' => 3.50,
                'compare_at_price' => null,
                'badges' => [],
                'availability' => 'AVAILABLE',
                'channel_tags' => ['RETAIL'],
                'is_featured' => false,
                'sort_order' => 9,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1517701550927-30cf4ba1dba5?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Chilled iced cafe latte',
                'image_alt_km' => 'កាហ្វេឡាតេទឹកកកឈ្ងុយឆ្ងាញ់',
            ],
            [
                'category_slug' => 'drinks',
                'slug' => 'espresso',
                'name_en' => 'Single Origin Espresso',
                'name_km' => 'កាហ្វេ Espresso ពិសេស',
                'description_en' => 'Intense and aromatic single origin espresso with golden crema and notes of chocolate and stone fruit.',
                'description_km' => 'កាហ្វេ espresso ក្លិនឈ្ងុយខ្លាំង ស្រទាប់ពពុះពណ៌មាស និងរសជាតិសូកូឡា។',
                'price' => 2.00,
                'compare_at_price' => null,
                'badges' => [],
                'availability' => 'AVAILABLE',
                'channel_tags' => ['RETAIL'],
                'is_featured' => false,
                'sort_order' => 10,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Rich espresso extraction with crema',
                'image_alt_km' => 'កាហ្វេ espresso ក្តៅឈ្ងុយ',
            ],
            [
                'category_slug' => 'frozen-bakery',
                'slug' => 'frozen-raw-croissant-small-30pcs',
                'name_en' => 'Frozen Raw Croissant (Small, 30pcs)',
                'name_km' => 'ក្រូសង់តូចក្លាស្សេឆៅ (៣០ ដុំ)',
                'description_en' => 'Ready-to-proof and bake mini butter croissants. Ideal for hotel breakfast buffets. Pack of 30 pieces.',
                'description_km' => 'ក្រូសង់ប៊ឺរខ្នាតតូចក្លាស្សេឆៅ ងាយស្រួលដុតសម្រាប់អាហារពេលព្រឹកសណ្ឋាគារ (កញ្ចប់ ៣០ ដុំ)។',
                'price' => null,
                'compare_at_price' => null,
                'badges' => [],
                'availability' => 'AVAILABLE',
                'channel_tags' => ['WHOLESALE', 'FROZEN'],
                'is_featured' => false,
                'sort_order' => 11,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Raw frozen mini croissants for wholesale baking',
                'image_alt_km' => 'ក្រូសង់តូចក្លាស្សេឆៅសម្រាប់ដុតលក់ដុំ',
            ],
            [
                'category_slug' => 'frozen-bakery',
                'slug' => 'frozen-raw-croissant-large-20pcs',
                'name_en' => 'Frozen Raw Croissant (Large, 20pcs)',
                'name_km' => 'ក្រូសង់ធំក្លាស្សេឆៅ (២០ ដុំ)',
                'description_en' => 'Standard French bakery size raw frozen butter croissants for cafes and hotels. Pack of 20 pieces.',
                'description_km' => 'ក្រូសង់ធំក្លាស្សេឆៅខ្នាតស្តង់ដារ សម្រាប់ហាងកាហ្វេ និងសណ្ឋាគារ (កញ្ចប់ ២០ ដុំ)។',
                'price' => null,
                'compare_at_price' => null,
                'badges' => [],
                'availability' => 'AVAILABLE',
                'channel_tags' => ['WHOLESALE', 'FROZEN'],
                'is_featured' => false,
                'sort_order' => 12,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Standard size frozen butter croissants in wholesale carton',
                'image_alt_km' => 'ក្រូសង់ធំក្លាស្សេឆៅសម្រាប់លក់ដុំ',
            ],
            [
                'category_slug' => 'frozen-bakery',
                'slug' => 'frozen-pain-au-chocolat-25pcs',
                'name_en' => 'Frozen Pain au Chocolat (25pcs)',
                'name_km' => 'ផេនអូសូកូឡាក្លាស្សេឆៅ (២៥ ដុំ)',
                'description_en' => 'Pre-formed raw frozen chocolate croissants with dual chocolate bars. Pack of 25 pieces.',
                'description_km' => 'ផេនអូសូកូឡាក្លាស្សេឆៅ ជាមួយសូកូឡាពីរដើម (កញ្ចប់ ២៥ ដុំ)។',
                'price' => null,
                'compare_at_price' => null,
                'badges' => [],
                'availability' => 'AVAILABLE',
                'channel_tags' => ['WHOLESALE', 'FROZEN'],
                'is_featured' => false,
                'sort_order' => 13,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1530610476181-d83430b64dcd?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Raw frozen Pain au Chocolat wholesale pack',
                'image_alt_km' => 'ផេនអូសូកូឡាក្លាស្សេឆៅសម្រាប់លក់ដុំ',
            ],
            [
                'category_slug' => 'cakes',
                'slug' => 'mango-cheesecake',
                'name_en' => 'Mango Cheesecake',
                'name_km' => 'ឈីសខេកស្វាយកែវរមៀត',
                'description_en' => 'Velvety New York style baked cheesecake topped with fresh Cambodian Keo Romeat mango compote.',
                'description_km' => 'ឈីសខេកដុតបែបញូវយ៉ក ស្រោបដោយដំណាប់ស្វាយកែវរមៀតខ្មែរស្រស់ៗ។',
                'price' => 16.00,
                'compare_at_price' => null,
                'badges' => ['SEASONAL'],
                'availability' => 'AVAILABLE',
                'channel_tags' => ['RETAIL'],
                'is_featured' => false,
                'sort_order' => 14,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1533134242443-d4fd215305ad?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Luscious seasonal Mango Cheesecake slice',
                'image_alt_km' => 'ឈីសខេកស្វាយកែវរមៀតស្រស់ៗ',
            ],
        ];

        $prodMap = [];
        foreach ($products as $p) {
            $catId = $catMap[$p['category_slug']] ?? null;
            if (!$catId) continue;

            $product = Product::updateOrCreate(
                ['slug' => $p['slug']],
                [
                    'category_id' => $catId,
                    'name_en' => $p['name_en'],
                    'name_km' => $p['name_km'],
                    'description_en' => $p['description_en'],
                    'description_km' => $p['description_km'],
                    'price' => $p['price'],
                    'compare_at_price' => $p['compare_at_price'],
                    'badges' => $p['badges'],
                    'availability' => $p['availability'],
                    'channel_tags' => $p['channel_tags'],
                    'is_featured' => $p['is_featured'],
                    'sort_order' => $p['sort_order'],
                    'status' => $p['status'],
                    'image' => $p['image'],
                    'image_alt_en' => $p['image_alt_en'],
                    'image_alt_km' => $p['image_alt_km'],
                    'published_at' => now(),
                ]
            );

            ProductImage::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'url' => $p['image'],
                ],
                [
                    'alt_en' => $p['image_alt_en'],
                    'alt_km' => $p['image_alt_km'],
                    'sort_order' => 0,
                ]
            );

            $prodMap[$p['slug']] = $product->id;
        }

        // 6. Promotions
        $promo1 = Promotion::updateOrCreate(
            ['id' => 1],
            [
                'title_en' => 'Buy 1 Get 1 Free',
                'title_km' => 'ទិញ ១ ថែម ១ ឥតគិតថ្លៃ',
                'badge_text_en' => 'BOGO',
                'badge_text_km' => 'ទិញ១ថែម១',
                'description_en' => 'Enjoy Buy 1 Get 1 Free on all fresh artisan pastries every evening from 6:00 PM to 9:00 PM.',
                'description_km' => 'រីករាយជាមួយការផ្តល់ជូនទិញ ១ ថែម ១ លើនំផេស្ត្រីស្រស់ៗទាំងអស់រៀងរាល់ល្ងាច ចាប់ពីម៉ោង ៦:០០ ល្ងាច ដល់ ៩:០០ យប់។',
                'fine_print_en' => 'Valid for in-store takeaway on selected fresh pastries while daily batches last.',
                'fine_print_km' => 'មានសុពលភាពសម្រាប់ការទិញវេចខ្ចប់នៅហាងលើនំផេស្ត្រីដែលបានកំណត់ រហូតដល់អស់ពីស្តុក។',
                'daily_start_time' => '18:00',
                'daily_end_time' => '21:00',
                'show_on_home' => true,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=1200&q=80',
                'image_alt_en' => 'Evening Buy 1 Get 1 Free pastry promotion at NOST Bakery',
                'image_alt_km' => 'ប្រូម៉ូសិនទិញ ១ ថែម ១ ពេលល្ងាចនៅ NOST Bakery',
            ]
        );

        $promo2 = Promotion::updateOrCreate(
            ['id' => 2],
            [
                'title_en' => 'New Flavour Launch — Durian Cream Cake',
                'title_km' => 'ការសម្ពោធរសជាតិថ្មី — នំខេកសាច់ទុរេន',
                'badge_text_en' => 'NEW',
                'badge_text_km' => 'ថ្មី',
                'description_en' => 'Introducing our signature Durian Cream Cake, crafted with authentic Kampot durian and delicate fresh whipped cream.',
                'description_km' => 'សូមណែនាំនំខេកសាច់ទុរេនពិសេសរបស់យើង ធ្វើឡើងពីទុរេនកំពតសុទ្ធ និងក្រែមស្រស់ទន់ល្មើយ។',
                'fine_print_en' => 'Available daily by the slice and for advance whole-cake pre-orders.',
                'fine_print_km' => 'មានលក់រៀងរាល់ថ្ងៃជាដុំ និងទទួលការកុម្ម៉ង់នំខេកទាំងមូលទុកជាមុន។',
                'show_on_home' => true,
                'status' => 'PUBLISHED',
                'image' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=1200&q=80',
                'image_alt_en' => 'Durian Cream Cake special launch',
                'image_alt_km' => 'ការសម្ពោធនំខេកសាច់ទុរេនថ្មី',
            ]
        );

        $bogoIds = array_filter([
            $prodMap['classic-butter-croissant'] ?? null,
            $prodMap['pain-au-chocolat'] ?? null,
            $prodMap['almond-croissant'] ?? null,
        ]);
        $promo1->products()->sync($bogoIds);

        if (!empty($prodMap['durian-cream-cake'])) {
            $promo2->products()->sync([$prodMap['durian-cream-cake']]);
        }

        // 7. Wholesale Settings & Steps
        WholesaleSetting::updateOrCreate(
            ['id' => 'default'],
            [
                'hero_headline_en' => 'Bakery Supplies for Your Business',
                'hero_headline_km' => 'ការផ្គត់ផ្គង់នំប៉័ងសម្រាប់អាជីវកម្មរបស់អ្នក',
                'hero_sub_headline_en' => 'Consistent quality frozen and ready-to-bake products for hotels, cafés and restaurants.',
                'hero_sub_headline_km' => 'ផលិតផលក្លាស្សេ និងនំសម្រាប់ដុតដែលមានគុណភាពខ្ពស់ជាប់លាប់ សម្រាប់សណ្ឋាគារ ហាងកាហ្វេ និងភោជនីយដ្ឋាន។',
                'hero_image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=1600&q=80',
                'delivery_coverage_en' => 'Siem Reap City and expanding routes across Cambodia with temperature-controlled cold chain logistics.',
                'delivery_coverage_km' => 'ក្រុងសៀមរាប និងពង្រីកផ្លូវដឹកជញ្ជូនទូទាំងប្រទេសកម្ពុជា ជាមួយរថយន្តក្លាស្សេត្រជាក់ត្រឹមត្រូវ។',
                'minimum_order_text_en' => 'Flexible minimum orders for regular wholesale partners. Customized delivery schedules available.',
                'minimum_order_text_km' => 'ចំនួនបញ្ជាទិញអប្បបរមាមានភាពបត់បែនសម្រាប់ដៃគូលក់ដុំប្រចាំ។ មានកាលវិភាគដឹកជញ្ជូនតាមតម្រូវការ។',
            ]
        );

        $steps = [
            [
                'title_en' => 'Enquire',
                'title_km' => 'សាកសួរ',
                'description_en' => 'Tell us what you need via our simple online form or directly through our Telegram hotline.',
                'description_km' => 'ប្រាប់យើងពីអ្វីដែលអ្នកត្រូវការតាមទម្រង់សាកសួរ ឬទាក់ទងមកយើងតាម Telegram។',
                'icon' => 'message-square',
                'sort_order' => 1,
            ],
            [
                'title_en' => 'Choose Products',
                'title_km' => 'ជ្រើសរើសផលិតផល',
                'description_en' => 'Select from our frozen croissants, baguettes, and ready-to-bake items tailored to your volume.',
                'description_km' => 'ជ្រើសរើសពីផលិតផលក្លាស្សេ និងនំសម្រាប់ដុតរបស់យើងដែលស័ក្តិសមសម្រាប់ហាងកាហ្វេ និងសណ្ឋាគារ។',
                'icon' => 'shopping-bag',
                'sort_order' => 2,
            ],
            [
                'title_en' => 'Confirm Delivery',
                'title_km' => 'បញ្ជាក់ការដឹកជញ្ជូន',
                'description_en' => 'We arrange dedicated cold-chain delivery directly to your kitchen on your preferred schedule.',
                'description_km' => 'យើងរៀបចំកាលវិភាគដឹកជញ្ជូនក្លាស្សេត្រជាក់ត្រឹមត្រូវទៅដល់ផ្ទះបាយរបស់អ្នកតាមការកំណត់។',
                'icon' => 'truck',
                'sort_order' => 3,
            ],
            [
                'title_en' => 'Receive & Bake',
                'title_km' => 'ទទួល និងដុតនំ',
                'description_en' => 'Receive fresh-frozen products at your door, ready to proof and bake fresh for your guests.',
                'description_km' => 'ទទួលផលិតផលក្លាស្សេស្រស់ៗដល់មាត់ទ្វារ រួចរាល់សម្រាប់ផ្អាប់ និងដុតក្តៅៗជូនភ្ញៀវ។',
                'icon' => 'sparkles',
                'sort_order' => 4,
            ],
        ];

        foreach ($steps as $st) {
            WholesaleStep::updateOrCreate(['title_en' => $st['title_en']], $st);
        }

        // 8. Locations
        Location::updateOrCreate(
            ['name_en' => 'NOST Bakery Café at Angkor Mansion & Residence'],
            [
                'name_km' => 'NOST Bakery Café នៅ អង់គរ ម៉េនសិន & រេស៊ីដិនស៍',
                'address_en' => 'Angkor Mansion & Residence, Siem Reap, Cambodia',
                'address_km' => 'អង់គរ ម៉េនសិន & រេស៊ីដិនស៍, សៀមរាប, កម្ពុជា',
                'hours_en' => 'Mon-Sun: 7:00 AM - 9:00 PM',
                'hours_km' => 'ចន្ទ - អាទិត្យ: ៧:០០ ព្រឹក - ៩:០០ យប់',
                'image' => 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=1200&q=80',
                'image_alt_en' => 'NOST Bakery Café dining room and terrace',
                'image_alt_km' => 'បរិយាកាសកក់ក្តៅក្នុងហាង NOST Bakery Café',
                'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3881.9!2d103.85!3d13.36!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTPCsDIxJzM2LjAiTiAxMDPCsDUxJzAwLjAiRQ!5e0!3m2!1sen!2skh!4v1',
                'directions_link' => 'https://maps.google.com/?q=Siem+Reap+Cambodia',
                'services' => ['Dine-in', 'Takeaway', 'Desserts & drinks'],
                'sort_order' => 1,
                'is_visible' => true,
            ]
        );

        // 9. Story Blocks
        $storyBlocks = [
            [
                'heading_en' => 'From Our Oven',
                'heading_km' => 'ពីចង្ក្រានដុតនំរបស់យើង',
                'text_en' => 'Every morning before sunrise, our bakers mix, laminate, and bake using traditional European techniques. We believe great bread cannot be rushed — our doughs rest and ferment slowly to unlock deep natural flavors and an airy, balanced crumb.',
                'text_km' => 'រៀងរាល់ព្រឹកព្រលឹម មុនពេលព្រះអាទិត្យរះ មេចុងភៅនំប៉័ងរបស់យើងច្របល់ ធ្វើស្រទាប់ និងដុតនំតាមបច្ចេកទេសបែបអឺរ៉ុបបុរាណ។ យើងជឿជាក់ថានំប៉័ងដ៏អស្ចារ្យមិនអាចប្រញាប់ប្រញាល់បានឡើយ គឺត្រូវទុកឱ្យមេនំប៉័ងមានពេលសម្រាក និងផ្អាប់យឺតៗដើម្បីបង្កើតរសជាតិធម្មជាតិដ៏ឈ្ងុយឆ្ងាញ់។',
                'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Fresh artisanal baguettes straight from the deck oven',
                'image_alt_km' => 'បាហ្គែតស្រស់ៗចេញពីឡដុត',
                'layout' => 'IMAGE_LEFT',
                'sort_order' => 1,
                'is_visible' => true,
            ],
            [
                'heading_en' => 'Real Ingredients',
                'heading_km' => 'គ្រឿងផ្សំពិតៗប្រកបដោយគុណភាព',
                'text_en' => 'We source high-grade unbleached flours, rich European butter with 82% milkfat, fresh local eggs, and hand-selected Cambodian seasonal fruits like Kampot durian and Keo Romeat mango. No artificial additives, no shortcuts — just honest baking you can taste.',
                'text_km' => 'យើងជ្រើសរើសម្សៅមីកម្រិតខ្ពស់ដែលគ្មានជាតិគីមី ប៊ឺរអឺរ៉ុបដែលមានជាតិខ្លាញ់ ៨២% ពងមាន់ស្រស់ក្នុងស្រុក និងផ្លែឈើខ្មែរតាមរដូវដូចជាទុរេនកំពត និងស្វាយកែវរមៀត។ គ្មានសារធាតុរក្សាទុក គ្មានផ្លូវកាត់ — គឺការដុតនំដោយភាពស្មោះត្រង់។',
                'image' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=1000&q=80',
                'image_alt_en' => 'Laminated pastry dough with pure French butter',
                'image_alt_km' => 'ស្រទាប់ម្សៅនំជាមួយប៊ឺរបារាំងសុទ្ធ',
                'layout' => 'IMAGE_RIGHT',
                'sort_order' => 2,
                'is_visible' => true,
            ],
            [
                'heading_en' => 'Growing Beyond Siem Reap',
                'heading_km' => 'រីកចម្រើនលើសពីសៀមរាប',
                'text_en' => 'From our flagship café at Angkor Mansion & Residence, NOST has expanded into trusted wholesale supply for luxury hotels, boutique resorts, and bustling cafés across Cambodia. We share our passion for fresh pastries wherever hospitality thrives.',
                'text_km' => 'ចេញពីហាងកាហ្វេដំបូងរបស់យើងនៅ Angkor Mansion & Residence ឥឡូវនេះ NOST បានពង្រីកខ្លួនទៅជាអ្នកផ្គត់ផ្គង់លក់ដុំដ៏គួរឱ្យទុកចិត្តសម្រាប់សណ្ឋាគារប្រណីត រីសត និងហាងកាហ្វេនានាទូទាំងកម្ពុជា។',
                'image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=1600&q=80',
                'image_alt_en' => 'NOST Bakery hospitality partnerships across Cambodia',
                'image_alt_km' => 'ដៃគូលក់ដុំ NOST Bakery ទូទាំងកម្ពុជា',
                'layout' => 'FULL_WIDTH',
                'sort_order' => 3,
                'is_visible' => true,
            ],
        ];

        foreach ($storyBlocks as $sb) {
            StoryBlock::updateOrCreate(['heading_en' => $sb['heading_en']], $sb);
        }

        // 10. FAQs
        $faqs = [
            [
                'question_en' => 'What is the minimum wholesale order?',
                'question_km' => 'តើការបញ្ជាទិញលក់ដុំអប្បបរមាជាអ្វី?',
                'answer_en' => "We're flexible! Small sample orders start from 2 cartons so you can test product fit and baking ease before scaling regular shipments.",
                'answer_km' => 'យើងមានភាពបត់បែនខ្ពស់! ការកុម្ម៉ង់សាកល្បងចាប់ផ្តើមពីត្រឹមតែ ២ កេសប៉ុណ្ណោះ ដើម្បីឱ្យអ្នកសាកល្បងដុត និងទទួលមតិពីអតិថិជន។',
                'section' => 'wholesale',
                'sort_order' => 1,
                'is_visible' => true,
            ],
            [
                'question_en' => 'Where do you deliver?',
                'question_km' => 'តើអ្នកដឹកជញ្ជូនទៅទីណាខ្លះ?',
                'answer_en' => 'Currently we deliver daily across Siem Reap city. We also arrange regular cold-chain shipments to Phnom Penh and Battambang.',
                'answer_km' => 'បច្ចុប្បន្នយើងដឹកជញ្ជូនជារៀងរាល់ថ្ងៃក្នុងក្រុងសៀមរាប។ យើងក៏រៀបចំការដឹកជញ្ជូនក្លាស្សេទៅកាន់រាជធានីភ្នំពេញ និងខេត្តបាត់ដំបងផងដែរ។',
                'section' => 'wholesale',
                'sort_order' => 2,
                'is_visible' => true,
            ],
            [
                'question_en' => 'What is the lead time for orders?',
                'question_km' => 'តើរយៈពេលរង់ចាំសម្រាប់ការបញ្ជាទិញមានប៉ុន្មាន?',
                'answer_en' => 'Standard wholesale orders require 2-3 business days to allow fresh preparation and rapid flash-freezing to preserve structure.',
                'answer_km' => 'ការបញ្ជាទិញលក់ដុំទូទៅត្រូវការពេល ២ ទៅ ៣ ថ្ងៃនៃថ្ងៃធ្វើការ ដើម្បីធានាបាននូវការផលិតថ្មីៗ និងការក្លាស្សេឱ្យបានត្រឹមត្រូវ។',
                'section' => 'wholesale',
                'sort_order' => 3,
                'is_visible' => true,
            ],
            [
                'question_en' => 'How should I store and bake frozen products?',
                'question_km' => 'តើខ្ញុំគួរទុកដាក់ និងដុតផលិតផលក្លាស្សេដោយរបៀបណា?',
                'answer_en' => 'Keep frozen at -18°C or colder upon arrival. Defrost and proof according to our included guide, then bake in a preheated oven at 175°C for golden, flaky perfection.',
                'answer_km' => 'សូមរក្សាទុកភ្លាមៗក្នុងទូទឹកកកកកនៅសីតុណ្ហភាព -១៨°C ឬត្រជាក់ជាងនេះ។ ផ្អាប់ និងដុតតាមការណែនាំដែលភ្ជាប់ជូន ដើម្បីទទួលបាននំស្រួយស្រទាប់ពណ៌មាស។',
                'section' => 'wholesale',
                'sort_order' => 4,
                'is_visible' => true,
            ],
        ];

        foreach ($faqs as $fq) {
            FaqItem::updateOrCreate(['question_en' => $fq['question_en']], $fq);
        }

        // 11. Home Sections
        $homeSections = [
            [
                'section_key' => 'hero',
                'headline_en' => 'Fresh from our oven to your table.',
                'headline_km' => 'ស្រស់ៗពីចង្ក្រានរបស់យើង ទៅកាន់តុរបស់អ្នក។',
                'sub_headline_en' => 'SIEM REAP · BAKERY & PASTRY',
                'sub_headline_km' => 'សៀមរាប · នំប៉័ង និង នំផេស្ត្រី',
                'body_en' => 'Daily fresh breads, pastries and cakes, plus frozen bakery supplies for your business.',
                'body_km' => 'នំប៉័ង នំផេស្ត្រី និងនំខេកស្រស់ៗរៀងរាល់ថ្ងៃ រួមជាមួយការផ្គត់ផ្គង់នំប៉័ងក្លាស្សេសម្រាប់អាជីវកម្មរបស់អ្នក។',
                'button_label_en' => 'Order Now',
                'button_label_km' => 'បញ្ជាទិញឥឡូវ',
                'button_link' => '/contact',
                'button2_label_en' => 'Wholesale Enquiry',
                'button2_label_km' => 'សាកសួរលក់ដុំ',
                'button2_link' => '/wholesale',
                'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=1600&q=80',
                'sort_order' => 1,
                'is_visible' => true,
            ],
            [
                'section_key' => 'offers',
                'headline_en' => "Today's Offers",
                'headline_km' => 'ការផ្តល់ជូនពិសេសថ្ងៃនេះ',
                'sub_headline_en' => 'Special savings on your favorite freshly baked goods.',
                'sub_headline_km' => 'ការបញ្ចុះតម្លៃពិសេសលើនំដុតថ្មីៗដែលអ្នកពេញចិត្ត។',
                'body_en' => 'Catch our popular evening Buy 1 Get 1 Free deal and seasonal flavour launches.',
                'body_km' => 'រីករាយជាមួយប្រូម៉ូសិនទិញ ១ ថែម ១ ពេលល្ងាច និងការសម្ពោធរសជាតិថ្មីៗ។',
                'button_label_en' => 'View All Promotions',
                'button_label_km' => 'មើលការផ្តល់ជូនទាំងអស់',
                'button_link' => '/promotions',
                'sort_order' => 2,
                'is_visible' => true,
            ],
            [
                'section_key' => 'categories',
                'headline_en' => 'Shop by Category',
                'headline_km' => 'ទិញតាមប្រភេទ',
                'sub_headline_en' => 'Explore our complete selection of artisanal baked treats and drinks.',
                'sub_headline_km' => 'ស្វែងរកជម្រើសនំដុត និងភេសជ្ជៈដ៏សម្បូរបែបរបស់យើង។',
                'button_label_en' => 'View Full Menu',
                'button_label_km' => 'មើលបញ្ជីមុខម្ហូបទាំងអស់',
                'button_link' => '/menu',
                'sort_order' => 3,
                'is_visible' => true,
            ],
            [
                'section_key' => 'favourites',
                'headline_en' => 'Fresh Favourites',
                'headline_km' => 'មុខម្ហូបពេញនិយម',
                'sub_headline_en' => 'Our most-loved daily baked signature pastries and breads.',
                'sub_headline_km' => 'នំផេស្ត្រី និងនំប៉័ងប្រចាំហាងដែលទទួលបានការស្រឡាញ់បំផុត។',
                'button_label_en' => 'See All Items',
                'button_label_km' => 'មើលមុខទំនិញទាំងអស់',
                'button_link' => '/menu',
                'sort_order' => 4,
                'is_visible' => true,
            ],
            [
                'section_key' => 'promise',
                'headline_en' => 'Our Fresh Promise',
                'headline_km' => 'ការសន្យាភាពស្រស់ថ្មីរបស់យើង',
                'sub_headline_en' => 'Baked every day with real ingredients and careful craft in Siem Reap.',
                'sub_headline_km' => 'ដុតនំជារៀងរាល់ថ្ងៃ ជាមួយគ្រឿងផ្សំពិត និងភាពផ្ចិតផ្ចង់នៅសៀមរាប។',
                'body_en' => 'We wake up early so you can enjoy flaky, buttery pastries and crusty sourdoughs made from natural ingredients without preservatives.',
                'body_km' => 'យើងក្រោកពីព្រលឹមដើម្បីឱ្យអ្នកទទួលបាននំស្រទាប់ប៊ឺរ និងនំប៉័ងសួរដូរសំបកស្រួយ ផលិតពីគ្រឿងផ្សំធម្មជាតិគ្មានសារធាតុរក្សាទុក។',
                'button_label_en' => 'Read Our Story',
                'button_label_km' => 'អានរឿងរ៉ាវរបស់យើង',
                'button_link' => '/bakery',
                'sort_order' => 5,
                'is_visible' => true,
                'extra_data' => [
                    'points' => [
                        [
                            'titleEn' => 'Baked Every Day',
                            'titleKm' => 'ដុតរៀងរាល់ថ្ងៃ',
                            'descEn' => 'Fresh batches every morning at 6:00 AM',
                            'descKm' => 'ដុតថ្មីៗរៀងរាល់ព្រឹក ម៉ោង ៦:០០',
                        ],
                        [
                            'titleEn' => 'Real Ingredients',
                            'titleKm' => 'គ្រឿងផ្សំពិតៗ',
                            'descEn' => 'Pure French butter, unbleached flour, no shortcuts',
                            'descKm' => 'ប៊ឺរបារាំងសុទ្ធ ម្សៅគុណភាពខ្ពស់ គ្មានផ្លូវកាត់',
                        ],
                        [
                            'titleEn' => 'Made in Siem Reap',
                            'titleKm' => 'ផលិតនៅសៀមរាប',
                            'descEn' => 'Proudly rooted in the heart of Cambodia',
                            'descKm' => 'ដោយមោទនភាពនៅក្នុងទឹកដីប្រវត្តិសាស្ត្រសៀមរាប',
                        ],
                    ],
                ],
            ],
            [
                'section_key' => 'business',
                'headline_en' => 'For Businesses',
                'headline_km' => 'សម្រាប់អាជីវកម្ម',
                'sub_headline_en' => 'Bakery supplies for hotels, cafés and restaurants.',
                'sub_headline_km' => 'ការផ្គត់ផ្គង់នំប៉័ងសម្រាប់សណ្ឋាគារ ហាងកាហ្វេ និងភោជនីយដ្ឋាន។',
                'body_en' => 'Raw frozen croissants (small and large), ready-to-bake pastries, and consistent quality with reliable delivery options.',
                'body_km' => 'ក្រូសង់ក្លាស្សេឆៅ (ខ្នាតតូច និងធំ) នំសម្រាប់ដុត និងគុណភាពខ្ពស់ជាប់លាប់ ជាមួយសេវាដឹកជញ្ជូនគួរឱ្យទុកចិត្ត។',
                'button_label_en' => 'Explore Wholesale',
                'button_label_km' => 'ស្វែងយល់ពីការលក់ដុំ',
                'button_link' => '/wholesale',
                'sort_order' => 6,
                'is_visible' => true,
            ],
        ];

        foreach ($homeSections as $hs) {
            HomeSection::updateOrCreate(['section_key' => $hs['section_key']], $hs);
        }

        // 12. Testimonials
        Testimonial::updateOrCreate(
            ['name' => 'Sarah Mitchell'],
            [
                'text_en' => 'The croissants here take me straight back to Paris. Absolutely flaky, golden, and rich with real French butter.',
                'text_km' => 'ក្រូសង់នៅទីនេះធ្វើឱ្យខ្ញុំនឹកឃើញដល់ទីក្រុងប៉ារីស។ ស្រទាប់ស្រួយពណ៌មាស និងឈ្ងុយប៊ឺរបារាំងពិតៗ។',
                'rating' => 5,
                'is_visible' => true,
                'sort_order' => 1,
            ]
        );

        Testimonial::updateOrCreate(
            ['name' => 'Sokha Ly'],
            [
                'text_en' => 'The Durian Cream Cake was the star of our family gathering! Fresh Kampot durian and so light.',
                'text_km' => 'នំខេកសាច់ទុរេនគឺជាចំណូលចិត្តរបស់គ្រួសារយើង! ធ្វើពីទុរេនកំពតស្រស់ៗ រសជាតិស្រាលឆ្ងាញ់។',
                'rating' => 5,
                'is_visible' => true,
                'sort_order' => 2,
            ]
        );
    }
}
