<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasColumn('users', 'position_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->foreignId('position_id')->nullable()->after('id')->constrained();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if(Schema::hasColumn('users', 'position_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign('users_position_id_foreign');
//                $table->dropForeign(['position_id']);
                $table->dropColumn('position_id');
            });
        }
    }
};
