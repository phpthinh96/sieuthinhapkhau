<?php

namespace Fico7489\Laravel\RevisionableUpgrade\Tests\Models;

class Seller extends BaseModel
{
    protected $table = 'sellers';

    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot(['value']);
    }
}
