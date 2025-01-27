<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Todo
 * @package App\Models
 * @version January 5, 2025, 6:05 pm JST
 *
 * @property integer $user_id
 * @property string $title
 * @property integer $status
 */
class Todo extends Model
{
    public static $statusNames = [
        '未対応',
        '処理中',
        '処理済',
        '完了',
    ];

    public function getStatusNameAttribute(): string
    {
        return self::$statusNames[$this->status];
    }
    use SoftDeletes;

    use HasFactory;

    public $table = 'todos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'title',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'title' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|max:255',
        'status' => 'required|numeric'
    ];

    
}
