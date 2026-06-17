<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

#[Fillable(['kode', 'gejala_id', 'stunting_id', 'probabilitas'])]
class Bobot extends Pivot
{
    protected $table = 'bobots';

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function gejala() : BelongsTo
    {
        return $this->belongsTo(Gejala::class);
    }

    public function stunting() : BelongsTo
    {
        return $this->belongsTo(Stunting::class);
    }
}
