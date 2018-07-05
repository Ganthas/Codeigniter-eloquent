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
            $userWrapper = UserPersistence::find($id);
            $userWrapper->role;
            $userDomain = new User();
            if ($userWrapper) {
                Utils::setDomainFromWrapper($userWrapper, $userDomain);
            }
        } catch (Exception $e) {
            throw new Exception($e);
        }
        return $userDomain;
    }
}
