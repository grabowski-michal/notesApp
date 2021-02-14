<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Note extends Model
{
    use HasFactory;
    use Sortable;
    use \Mpociot\Versionable\VersionableTrait;

    protected $fillable = ['title', 'content'];
    public $sortable = ['title', 'created_at', 'updated_at'];
}
