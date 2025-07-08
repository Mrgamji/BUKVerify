<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Organization extends Authenticatable
{
   protected $guarded=[];
   protected $guard = 'organization';
   public function getAuthIdentifierName()
   {
       return 'organization_id';
   }

   public function getAuthIdentifier()
   {
       return $this->organization_id;
   }
}
