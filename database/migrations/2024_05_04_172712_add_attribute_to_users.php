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
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->default(null);
            $table->string('admissign_number')->default(null);
            $table->date('admissign_date')->default(null);
            $table->string('roll_number')->default(null);
            $table->integer('class_id')->default(null);
            $table->string('gender')->default(null);
            $table->date('birthday');
            $table->tinyInteger('status')->default(0)->comment('0:active 1:inactive');
            $table->string('caste')->default(null);
            $table->string('address')->default(null);
            $table->string('mobile_number')->default(null);
            $table->string('profile_pic')->default(null);
            $table->string('blood_group')->default(null);
            $table->string('height')->default(null);
            $table->string('weight')->default(null);
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
