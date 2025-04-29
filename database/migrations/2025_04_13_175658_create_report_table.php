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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->string('clientname');
            $table->text('clientaddress');
            $table->string('jobname');
            $table->string('jobno');
            $table->string('reportno');
            $table->date('date_of_rt');
            $table->text('description');
            $table->string('status');
            $table->string('reported_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
