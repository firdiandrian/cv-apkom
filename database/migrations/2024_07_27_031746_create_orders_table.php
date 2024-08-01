<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->integer('quantity');
            $table->decimal('total_price', 15, 2);
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_address');
            $table->timestamps();

            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
