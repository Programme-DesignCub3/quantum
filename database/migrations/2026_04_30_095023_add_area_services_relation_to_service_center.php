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
        Schema::table('service_centers', function (Blueprint $table) {
            $table->foreignId('area_service_id')->nullable()->constrained('area_services')->onDelete('set null')->after('type_service_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_centers', function (Blueprint $table) {
            $table->dropForeign(['area_service_id']);
            $table->dropColumn('area_service_id');
        });
    }
};
