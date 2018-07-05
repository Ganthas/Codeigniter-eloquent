<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class UserPersistence extends Eloquent
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username', 'email', 'role_id',
    ];

    public $fields = [
        'user_id', 'username', 'email', 'role_id',
    ];

    public function role()
    {
        return $this->belongsTo(RolePersistence::class, 'role_id');
    }
}
