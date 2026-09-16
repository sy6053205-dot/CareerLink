<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_postings', function (Blueprint $table) {
            $table->string('location')->nullable()->after('title');
            $table->enum('work_mode', ['on_site', 'remote', 'hybrid'])->default('on_site')->after('location');
            $table->enum('job_type', ['full_time', 'part_time', 'freelance', 'contract'])->default('full_time')->after('work_mode');
            $table->decimal('salary_min', 10, 2)->nullable()->after('job_type');
            $table->decimal('salary_max', 10, 2)->nullable()->after('salary_min');
        });
    }

    public function down(): void
    {
        Schema::table('job_postings', function (Blueprint $table) {
            $table->dropColumn(['location', 'work_mode', 'job_type', 'salary_min', 'salary_max']);
        });
    }
};