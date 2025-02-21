<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property int $number
 * @property string|null $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|History newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|History newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|History query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|History whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|History whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|History whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|History whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|History whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|History whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|History whereUserId($value)
 * @mixin \Eloquent
 */
class History extends Model
{
    protected $guarded = ['id'];

    public function getAmountFormattedAttribute(): string
    {
        return $this->amount ? '$' . number_format($this->amount, 2, '.', '') : '';
    }
}
