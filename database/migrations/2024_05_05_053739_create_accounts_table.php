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
        if (Schema::hasColumn('accounts', 'column')) {
            Schema::create('accounts', function (Blueprint $table) {
                $table->id();
                $table->integer( 'finset_id' );
                $table->string( 'account_id' );
                $table->bigInteger( 'current_value' );
                $table->string( 'name' );
                $table->integer( 'status' );
                $table->timestamps();
            });
        } else {
            Schema::table('accounts', function (Blueprint $table) {
                if (!Schema::hasColumn('accounts', 'account_id')) {
                    $table->string('account_id');
                }
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
        Schema::dropIfExists('accounts');
    }
};
