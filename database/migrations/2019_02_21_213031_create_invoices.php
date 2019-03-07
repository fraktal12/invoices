<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('invoices', function (Blueprint $table) {

            $table->increments('id');
            $table->string('invoiceNo')->unique();
            $table->date('invoiceDate')->nullable();
            $table->date('dueDate')->nullable();
            $table->enum('status',['unpaid','paid','cancelled'])->default('unpaid');
            $table->string('title');
            $table->string('client');
            $table->string('clientAddress');
            $table->decimal('subTotal',10,2)->default(0);
            $table->decimal('discount')->default(0);
            $table->decimal('total',10,2)->default(0);
            $table->text('termsAndConditions')->nullable();
            $table->timestamps();
        });

        Schema::create('invoice_items', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('invoiceId');
            $table->foreign('invoiceId')->references('id')->on('invoices');
            $table->char('item', 255);
            $table->integer('qty');
            $table->decimal('unitPrice',10,2)->default(0);
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

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('invoice_items');
        Schema::enableForeignKeyConstraints();

    }
}
