<?php

use App\Models\{Note,Course,Student};
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
        Schema::create('certifieds', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->longText('qrcode');
            $table->string('signature');
            $table->ForeignIdFor(Course::class);
            $table->ForeignIdFor(Student::class);
            $table->ForeignIdFor(Note::class);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certifieds');
    }
};
