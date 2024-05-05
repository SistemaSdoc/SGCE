<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{School,Course,User};
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birthday');
            $table->string('email')->unique();
            $table->string('phonenumber');
            $table->string('number_bi');
            $table->string('address');
            $table->string('fathername');
            $table->string('mothername');
            $table->string('nationality');
            $table->string('province');
            $table->string('municipality');
            $table->ForeignIdFor(School::class);
            $table->ForeignIdFor(Course::class);
            $table->ForeignIdFor(User::class);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
