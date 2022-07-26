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
        Schema::create('deposits', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users');
            $table->foreignUuid('payment_method_id')->constrained('payment_methods');
            $table->json('payment_method_json');
            $table->decimal('amount', 16,2)->nullable();
            $table->decimal('random_amount', 8,2)->nullable();
            $table->decimal('total', 16,2);
            $table->unsignedTinyInteger('status')->default(0);
            $table->decimal('expired_at', 25, 6)->nullable();
            $table->decimal('canceled_at', 25, 6)->nullable();

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
        Schema::dropIfExists('deposits');
    }
};
