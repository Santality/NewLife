<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_number',
        'contact_email',
        'kind',
        'description',
        'mark',
        'area',
        'find_date',
        'status',
        'photo',
        'id_user'
    ];

    public function kinds()
    {
        return $this->belongsTo(Kind::class, 'kind');
    }

    public function areas()
    {
        return $this->belongsTo(Area::class, 'area');
    }

    public function statuses()
    {
        return $this->belongsTo(Status::class, 'status');
    }
}
