<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRequest extends Model
{
    use HasFactory;

    protected $table = 'clients_requests';

    protected $fillable = [
        'full_name',
        'email',
        'telephone',
        'company',
        'subject',
        'preferred_date',
        'role',
        'preferred_time',
    ];
}
