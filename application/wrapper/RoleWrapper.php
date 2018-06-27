<?php
defined("BASEPATH") or exit("El acceso directo al script no está permitido!!!");

class RoleWrapper
{
    public static function getAllRoles()
    {
        try {
            $allRoles = RolePersistence::all();
        } catch (Exception $e) {
            throw new Exception($e);
        }
        return $allRoles;
    }

    public static function getById($id)
    {
        try {
            $role = RolePersistence::find($id);
        } catch (Exception $e) {
            throw new Exception($e);
        }
        return $role;
    }
}
