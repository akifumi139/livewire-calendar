<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // ユーザー認証を使用する場合

class Schedule extends Model
{
    use HasFactory;

    /**
     * モデルに割り当て可能な属性。
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'date',
        'title',
        'description',
        'start_time',
        'end_time',
    ];

    /**
     * 属性の型キャスト。
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

    /**
     * スケジュールを作成したユーザーを取得します。
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo // ユーザー認証を使用する場合
    {
        return $this->belongsTo(User::class);
    }
}
