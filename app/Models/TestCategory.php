<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestCategory extends Model
{
    use SoftDeletes;


    public const TYPE_TEST = 1;
    public const TYPE_RADIOLOGY = 2;
}
