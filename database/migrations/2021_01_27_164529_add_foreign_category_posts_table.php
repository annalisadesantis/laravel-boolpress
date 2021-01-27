<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // creo prima la colonna da mettere nella tabella posts
            $table->unsignedBigInteger('category_id')->nullable()->after('slug');
            // e sulla colonna creo il vincolo di chiave esterna
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // prima elimino il vincolo di chiave esterna
            // formato da= NomeDellaTabella + NomeColonna + foreign
            $table->dropForeign('posts_category_id_foreign');
            // dopo vado a eliminare la colonna dalla tabella posts
            $table->dropColumn('category_id');
        });
    }
}
