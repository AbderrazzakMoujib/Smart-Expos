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
        Schema::table('posts', function (Blueprint $table) {
            $table->text('what_happened')->nullable()->after('body');
            $table->text('what_upcoming')->nullable()->after('what_happened');
            $table->string('location')->nullable()->after('date');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['what_happened', 'what_upcoming', 'location']);
        });
    }
};
