<?php

namespace core;

/**
 * Wrapper class for role utility functions
 *
 * @author Przemysław Kudłacik
 */
class RoleUtils {

    public static function getRolesFromDatabase(){
        return App::getDB()->select("role",[
            "nameOfRole"
        ]);
    }

    public static function addRoleToDatabase($forWho,$role){
        $idUserFromDatabase=App::getDB()->get("user", "idUser", [
            "login" => $forWho
        ]);
        $idRoleFromDatabase=App::getDB()->get("role", "idRole", [
            "nameOfRole" => $role
        ]);

        try {
            App::getDB()->insert("roleofuser", [
                "idRole" => $idRoleFromDatabase,
                "idUser" => $idUserFromDatabase

            ]);
        }
        catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
    }

    public static function checkRoleInDatabase($forWho){
        $roleInDatabase= App::getDB()->get(
            "roleofuser",
            [
                // Here is the table relativity argument that tells the relativity between the table you want to join.
                "[>]role" => ["idRole" => "idRole"],
                "[>]user" => ["idUser" => "idUser"]
            ],
            [
                "role.nameOfRole"

            ],
            [
                "user.login" => $forWho
            ]
        );
        return $roleInDatabase[array_key_first($roleInDatabase)];

    }

    public static function addRoleFromDatabase($forWho)
    {
        $rolefromdatabase = self::checkRoleInDatabase($forWho);
        switch($rolefromdatabase){
            case "systemAdmin":
                RoleUtils::addRole('systemAdmin');
                break;
            case "libraryAdmin":
                RoleUtils::addRole('libraryAdmin');
                break;
            case "user":
                RoleUtils::addRole('user');
                break;
            default:
                RoleUtils::addRole('guest');
        }

    }

    public static function addRole($role) {
        App::getConf()->roles [$role] = true;
        $_SESSION['_amelia_roles'] = serialize(App::getConf()->roles);
    }

    public static function removeRole($role) {
        if (isset(App::getConf()->roles [$role])) {
            unset(App::getConf()->roles [$role]);
            $_SESSION['_amelia_roles'] = serialize(App::getConf()->roles);
        }
    }

    public static function inRole($role) {
        return isset(App::getConf()->roles[$role]);
    }

    public static function requireRole($role, $fail_action = null) {
        if (!self::inRole($role)) {
            if (isset($fail_action))
                App::getRouter()->forwardTo($fail_action);
            else
                App::getRouter()->forwardTo(App::getRouter()->getLoginRoute());
        }
    }

}
