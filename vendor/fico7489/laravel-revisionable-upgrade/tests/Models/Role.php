<?php

namespace Fico7489\Laravel\RevisionableUpgrade\Tests\Models;

class Role extends BaseModel
{
    protected $table = 'roles';

    protected $fillable = ['name'];
}
