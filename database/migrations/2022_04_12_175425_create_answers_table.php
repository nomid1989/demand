<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAnswersTable.
 *
 * @author DaKoshin.
 */
class CreateAnswersTable extends Migration
{
    /**
     * Run migration.
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->string('text');
            $table->timestamps();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->cascadeOnDelete();
        });
    }

    /**
     * Rollback migration.
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
