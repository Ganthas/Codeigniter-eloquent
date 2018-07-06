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
            $users = array();
            foreach ($allUsers as $aux) {
                $user = new User();
                if ($aux) {
                    Utils::setDomainFromWrapper($aux, $user);
                }
                $users[] = $user;
            }
        } catch (Exception $e) {
            $user = new User();
            $user->resultCode = Utils::$errorcode;
            $user->resultDesc = Utils::$errordesc;
            // $e->messageError; mensaje para registrar en log
            return $user;
        }
        return $users;
    }

    public static function getById($id)
    {
        try {
            $userWrapper = UserPersistence::find($id);
            $user = new User();
            if ($userWrapper) {
                Utils::setDomainFromWrapper($userWrapper, $user);
            }
        } catch (Exception $e) {
            $user = new User();
            $user->resultCode = Utils::$errorcode;
            $user->resultDesc = Utils::$errordesc;
        }
        return $user;
    }
}
