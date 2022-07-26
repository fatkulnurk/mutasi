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
        Schema::create('mutations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users');
            $table->foreignUuid('bank_id')->constrained('banks');
            $table->string('type');
            $table->decimal('amount', 16,2);
            $table->text('description')->nullable();
            $table->string('date')->nullable();
            $table->boolean('is_manual')->default(false);
            $table->string('hash')->nullable()->unique();
            $table->decimal('created_at', 25, 6)->nullable();
            $table->decimal('updated_at', 25, 6)->nullable();
            $table->decimal('deleted_at', 25, 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutations');
    }
};
