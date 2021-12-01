<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];
    protected $perPage = 3;

    /** @noinspection PhpUnused */
    public function episodios(): HasMany
    {
        return $this->hasMany(Episodio::class);
    }


}
