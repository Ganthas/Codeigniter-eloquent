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
            $userWrapper = UserPersistence::find($id);
            $userDomain = new User();

            Utils::setDomainFromWrapper($userWrapper, $userDomain);
            Utils::debugArray($userDomain);

        } catch (Exception $e) {
            throw new Exception($e);
        }
        return $user;
    }
}
