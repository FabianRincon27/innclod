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
        Schema::create('doc_documents', function (Blueprint $table) {
            $table->id();
            $table->string('doc_name');
            $table->string('doc_code');
            $table->text('doc_content');
            $table->unsignedBigInteger('doc_id_type');
            $table->unsignedBigInteger('doc_id_process');
            $table->timestamps();

            $table->foreign('doc_id_type')->references('id')->on('tip_type_docs');
            $table->foreign('doc_id_process')->references('id')->on('pro_process');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_documentos');
    }
};
