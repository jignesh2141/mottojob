<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('corporate_name');
            $table->string('job_type');
            $table->integer('status');
            $table->string('prefecture');
            $table->string('japanese_lavel');
            $table->string('location');
            $table->text('description');
            $table->string('image');
            $table->text('responsibilities');
            $table->text('requirements');
            $table->string('minimum_working_days_per_week');
            $table->string('minimum_working_hours_per_day');
            $table->text('community_expenses');
            $table->text('benefits');
            $table->string('address');
            $table->string('latitude');
            $table->string('longitute');
            $table->string('salary');
            $table->string('salary_duration');
            $table->string('timing');
            $table->string('company_email');
            $table->date('last_date');
            $table->integer('no_of_vacancy');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
