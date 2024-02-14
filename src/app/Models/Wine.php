<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wine extends Model
{
    use HasFactory;
    use Filterable;
    
    protected $fillable = [
        "name",
        "discription",
        "price",
        "date",
        "type_id",
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
