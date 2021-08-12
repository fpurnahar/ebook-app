<?php

namespace Database\Seeders;

use App\Models\EbookCategory;
use Illuminate\Database\Seeder;

class EbookCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EbookCategory::create([
            'name' => 'Hacker',
        ]);
        EbookCategory::create([
            'name' => 'Pendidikan',
        ]);
        EbookCategory::create([
            'name' => 'Commic',
        ]);
        EbookCategory::create([
            'name' => 'Novel',
        ]);
        EbookCategory::create([
            'name' => 'Puisi',
        ]);
    }
}
