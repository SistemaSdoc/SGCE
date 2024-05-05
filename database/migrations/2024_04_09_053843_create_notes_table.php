<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{Discipline,Student,Course};
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->float('note1_quarter')->nullable();
            $table->float('note2_quarter')->nullable();
            $table->float('note3_quarter')->nullable();
            $table->float('average')->nullable();
            $table->ForeignIdFor(Student::class);
            $table->ForeignIdFor(Discipline::class);
            $table->ForeignIdFor(Course::class);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
