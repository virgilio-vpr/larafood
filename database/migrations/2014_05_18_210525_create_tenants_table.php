<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('plan_id');
            $table->uuid('uuid');
            $table->string('cnpj')->unique();
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->string('email')->unique();
            $table->string('logo')->nullable();

            // Status tenant (if inactivate 'N' it lost access into system)
            $table->enum('active', ['Y', 'N'])->default('Y');

            // Subscription
            $table->date('subscription')->nullable(); // Date of subscription
            $table->date('expires_at')->nullable(); // Date that expire access
            $table->string('subscription_at', 255)->nullable(); // Identify of Gateway
            $table->boolean('subscription_active')->default(false); // Subscription for 30 days
            $table->boolean('subscription_suspended')->default(false); // Canceled subscription

            $table->foreign('plan_id')
                        ->references('id')
                        ->on('plans');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
