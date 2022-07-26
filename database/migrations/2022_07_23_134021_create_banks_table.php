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
        Schema::create('banks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users');
            $table->foreignUuid('service_id')->constrained('services');
            $table->foreignUuid('package_id')->constrained('packages');
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->json('credential')->nullable();
            $table->json('authentication')->nullable();
            $table->string('callback_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedTinyInteger('login_retry')->default(0);

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
        Schema::dropIfExists('banks');
    }
};
