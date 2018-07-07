<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class RolePersistence extends Eloquent
{
    protected $table = 'roles';
    protected $primaryKey = 'role_id';

    protected $fillable = [
        'role'
    ];

    public function users()
    {
        return $this->hasMany(UserPersistence::class, 'role_id');
    }
}
