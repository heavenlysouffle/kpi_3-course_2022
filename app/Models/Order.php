<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Order
 *
 * @package Model
 * @author  Panelki
 */
class Order extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function panel(): BelongsTo
    {
        return $this->belongsTo('App\Models\Panel');
    }
}
