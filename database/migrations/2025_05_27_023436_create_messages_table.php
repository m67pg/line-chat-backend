<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            // メッセージ送信者のユーザーID（外部キー）
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // メッセージ本文
            $table->text('text');

            // メッセージが誰に送られたか（チャット相手やグループIDなど）
            $table->unsignedBigInteger('receiver_id')->nullable();

            // メッセージのタイプ（テキストや画像など拡張用）
            $table->string('type')->default('text');

            // 既読・未読などステータス（オプション）
            $table->boolean('is_read')->default(false);

            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
