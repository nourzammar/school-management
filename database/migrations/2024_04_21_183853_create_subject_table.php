<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subject', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default(null);
            $table->string('type')->default(null);
            $table->integer('created_by')->default(null);
            $table->tinyInteger('status')->default(0)->comment('0:not delete 1:inactive');
            $table->tinyInteger('is_delete')->default(0)->comment('0:not delete 1:delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject');
    }
};
