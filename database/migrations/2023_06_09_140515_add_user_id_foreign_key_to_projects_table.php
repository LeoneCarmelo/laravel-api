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
        Schema::table('projects', function (Blueprint $table) {
            #Add coloumn in table projects after id
            $table->unsignedBigInteger('user_id')->nullable()->after('id');

            #add foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            #remove foreign key
            $table->dropForeign('projects_user_id_foreign');
            #drop column
            $table->dropColumn('user_id');
        });
    }
};
