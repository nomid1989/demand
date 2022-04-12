<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Answer.
 *
 * @package App\Models
 * @author DaKoshin.
 */
class Answer extends Model
{
    /**
     * @var string[]
     */
    protected $guarded = ['id', 'created_at', 'update_at'];
}
