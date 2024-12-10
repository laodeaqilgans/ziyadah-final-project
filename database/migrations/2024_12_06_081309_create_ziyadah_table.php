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
        Schema::create('ziyadah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('santri_id')->index(); // Create the column and index it
            $table->integer('juz');
            $table->string('surat');
            $table->string('ayat');
            $table->text('catatan')->nullable();
            $table->date('tanggal_ziyadah');
            $table->timestamps();

            // Define the foreign key after defining the columns
            $table->foreign('santri_id') // Define the foreign key
                ->references('id') // Reference the 'id' column on the 'santris' table
                ->on('santris') // Specify the table name
                ->onDelete('cascade') // Set the action on delete
                ->onUpdate('cascade'); // Set the action on update
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ziyadah', function (Blueprint $table) {
            $table->dropForeign(['santri_id']); // Drop the foreign key constraint
        });

        Schema::dropIfExists('ziyadah');
    }
};