<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class RolePersistence extends Eloquent
{
    protected $table = 'roles';
    protected $primaryKey = 'rol_id';

    protected $fillable = [
        'rol'
    ];

    public function users()
    {
        return $this->belongsToMany(UserPersistence::class, 'rol_id');
    }
}
