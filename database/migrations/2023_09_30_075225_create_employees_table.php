<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->string('photo');
            $table->string('first_name', 20)->nullable();
            $table->string('last_name', 25);
            $table->string('email', 25);
            $table->string('phone_number', 20)->nullable();
            $table->date('hire_date');
            $table->string('job_id', 10)->index('job_id');
            $table->integer('salary');
            $table->integer('commission_pct')->nullable();
            $table->unsignedInteger('department_id')->nullable()->index('department_id');
            $table->string('observation');
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
