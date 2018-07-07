<?php
defined("BASEPATH") or exit("El acceso directo al script no está permitido!!!");

class RoleWrapper
{
    public static function getAllRoles()
    {
        try {
            $allRoles = RolePersistence::all();

            $roles = array();
            foreach ($allRoles as $aux) {
                $role = new Role();
                if ($aux) {
                    Utils::setDomainFromWrapper($aux, $role);
                }
                $roles[] = $role;
            }
        } catch (Exception $e) {
            $role = new Role();
            $role->resultCode = Utils::$errorcode;
            $role->resultDesc = $e->messageError;
            // $e->messageError; mensaje para registrar en log
            return $role;
        }
        return $roles;
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
