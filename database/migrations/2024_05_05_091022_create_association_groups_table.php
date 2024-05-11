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
        if (Schema::hasColumn('association_groups', 'column')) {
            Schema::create('association_groups', function (Blueprint $table) {
                $table->id();
                $table->integer( 'finset_id' );
                $table->string( 'name' );
                $table->integer( 'status' );
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('association_groups');
    }
};
