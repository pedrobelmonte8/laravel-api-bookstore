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
        Schema::table('books', function (Blueprint $table) {
            // Adding new fields to the book table
            $table->string('title')->after('id'); // Assuming 'id' is the
            $table->string('author')->after('title');
            $table->string('isbn')->after('author');
            $table->date('published_date')->after('isbn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book', function (Blueprint $table) {
            //
        });
    }
};
