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
        Schema::table('employees', function (Blueprint $table) {
            $table->foreign(['department_id'], 'employees_ibfk_2')->references(['department_id'])->on('departments');
            $table->foreign(['job_id'], 'employees_ibfk_1')->references(['job_id'])->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('employees_ibfk_2');
            $table->dropForeign('employees_ibfk_1');
        });
    }
};
