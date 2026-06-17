<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['kode', 'nama'])]
class Gejala extends Model
{
    /** @use HasFactory<\Database\Factories\GejalaFactory> */
    use HasFactory;

    protected $with = ['stuntings'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function stuntings() : BelongsToMany
    {
        return $this->belongsToMany(Stunting::class, 'bobots')
            ->using(Bobot::class)
            ->withPivot('kode','probabilitas')
            ->withTimestamps()
            ->as('bobot');
    }

    // public function bobots() : HasMany
    // {
    //     return $this->hasMany(Bobot::class);
    // }
}
