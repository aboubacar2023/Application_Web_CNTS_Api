<?php

use App\Models\DateRdv;
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
        Schema::create('date_rdvs', function (Blueprint $table) {
            $table->id();
            $table->dateTime('daterdv');
            $table->timestamps();
        });
        Schema::table('donneurs', function(Blueprint $table){
            $table->foreignIdFor(DateRdv::class)->constrained()->nullable()->cascadeOnelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('date_rdvs');
        Schema::table('donneurs', function(Blueprint $table){
            $table->dropforeignIdFor(DateRdv::class);
        });
    }
};
