<?php
defined("BASEPATH") or exit("El acceso directo al script no está permitido!!!");

class UserWrapper
{
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
