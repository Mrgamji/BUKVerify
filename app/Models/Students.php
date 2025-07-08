<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Students extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $guard = 'student';

    protected $guarded = [];

    public function getAuthIdentifierName()
    {
        return 'student_id';
    }

    public function getAuthIdentifier()
    {
        return $this->student_id;
    }
}