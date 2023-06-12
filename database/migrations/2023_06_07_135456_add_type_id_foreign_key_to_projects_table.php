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
            //Add column after id
            $table->unsignedBigInteger('type_id')->nullable()->after('id');
            //Add foreign key
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
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
            //Remove foreign key
            $table->dropForeign('projects_type_id_foreign');
            //Drop column
            $table->dropColumn('type_id');

        });
    }
};
