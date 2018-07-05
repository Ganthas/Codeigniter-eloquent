<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class RolePersistence extends Eloquent
{
    protected $table = 'roles';
    protected $primaryKey = 'role_id';

    protected $fillable = [
        'rol'
    ];

    public function users()
    {
        return $this->belongsToMany(UserPersistence::class, 'role_id');
    }
}
