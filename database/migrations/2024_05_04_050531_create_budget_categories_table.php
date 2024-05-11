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
        if (!Schema::hasTable('budget_categories')) {
            Schema::create('budget_categories', function (Blueprint $table) {
                $table->id();
                $table->integer( 'user_id' );
                $table->integer( 'finset_id' );
                $table->integer( 'parent_id' );
                $table->string( 'name' );
                $table->float( 'value' );
                $table->string( 'scope' );
                $table->boolean( 'status' );
                $table->timestamps();
            });
        } else {
            Schema::table('budget_categories', function (Blueprint $table) {
                if (!Schema::hasColumn('budget_categories', 'finset_id')) {
                    $table->integer('finset_id');
                }
                if (!Schema::hasColumn('budget_categories', 'user_id')) {
                    $table->integer('user_id');
                }
                if (!Schema::hasColumn('budget_categories', 'parent_id')) {
                    $table->integer('parent_id');
                }
                if (!Schema::hasColumn('budget_categories', 'name')) {
                    $table->integer('name');
                }
                if (!Schema::hasColumn('budget_categories', 'value')) {
                    $table->integer('value');
                }
                if (!Schema::hasColumn('budget_categories', 'scope')) {
                    $table->string('scope');
                }
                if (!Schema::hasColumn('budget_categories', 'status')) {
                    $table->boolean('status');
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
        Schema::dropIfExists('budget_categories');
    }
};
