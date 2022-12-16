<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger("category_id");
            $table->foreignId("category_id")->nullable()
                ->constrained("categories")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId("static_place_id")->nullable()
                ->constrained("static_places")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string("title", 255);
            $table->string("slug", 255);
            $table->longText("body");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->index("slug");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
