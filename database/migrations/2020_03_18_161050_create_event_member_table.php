<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_member', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('member_id');
            $table->string('exhibition_category')->nullable();
            $table->string('paper_title')->nullable();
            $table->string('author_affiliation')->nullable();
            $table->string('corresponding_email')->nullable();
            $table->string('abstract_doc_file')->nullable();
            $table->string('presentation_ppt_file')->nullable();
            $table->string('payment_method');
            $table->string('amount');
            $table->string('TrxID')->nullable();
            $table->string('bank_cheque')->nullable();
            $table->tinyInteger('payment_status')->default(0);
            $table->timestamp('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_member');
    }
}
