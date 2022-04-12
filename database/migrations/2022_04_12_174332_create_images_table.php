<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateImagesTable.
 *
 * @author DaKoshin.
 */
class CreateImagesTable extends Migration
{
    /**
     * Run migration.
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Rollback migration.
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
