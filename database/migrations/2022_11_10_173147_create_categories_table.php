<?php

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        $this->addCat();
    }

    private function addCat()
    {
        $data = [
            ['name' => 'Men\'s Wear', 'slug' => Str::lower(Str::slug('Men\'s Wear'))],
            ['name' => 'Women\'s Wear', 'slug' => Str::lower(Str::slug('Women\'s Wear'))],
            ['name' => 'Shoes', 'slug' => Str::lower(Str::slug('Shoes'))],
            ['name' => 'Electronics', 'slug' => Str::lower(Str::slug('Electronics'))],
        ];

        foreach ($data as $d) {
            Category::create($d);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
