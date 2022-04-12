<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreatePostsTable.
 *
 * @author DaKoshin.
 */
class CreatePostsTable extends Migration
{
    /**
     * Run migration.
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('image_id')->nullable();
            $table->string('title');
            $table->text('text');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('image_id')
                ->references('id')
                ->on('images')
                ->nullOnDelete();
        });
    }

    /**
     * Rollback migration.
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
