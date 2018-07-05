<?php

class UserWrapper
{
    public function __construct()
    {
    }

    public static function getAllUsers()
    {
        try {
            $allUsers = UserPersistence::all();
        } catch (Exception $e) {
            throw new Exception($e);
        }
        return $allUsers;
    }

    public static function getById($id)
    {
        try {
            $user = UserPersistence::find($id);
        } catch (Exception $e) {
            throw new Exception($e);
        }
        return $user;
    }
}
