<?php

namespace core;

/**
 * Wrapper class for basic utility functions
 *
 * @author Przemysław Kudłacik
 */
class Utils {

    public static function addRoute($action, $controller, $roles = null) {
        App::getRouter()->addRoute($action, $controller, $roles);
    }

    public static function addRouteEx($action, $path, $controller, $method, $roles = null) {
        App::getRouter()->addRouteEx($action, $path, $controller, $method, $roles);
    }

    public static function addErrorMessage($text, $index = null) {
        App::getMessages()->addMessage(new Message($text, Message::ERROR), $index);
    }

    public static function addInfoMessage($text, $index = null) {
        App::getMessages()->addMessage(new Message($text, Message::INFO), $index);
    }

    public static function addWarningMessage($text, $index = null) {
        App::getMessages()->addMessage(new Message($text, Message::WARNING), $index);
    }

    private static function _url_maker($action, $params = null) {
        $url = $action;
        if ($params != null && is_array($params)) {
            foreach ($params as $key => $value) {
                if (App::getConf()->clean_urls) {
                    $url .= '/';
                } else {
                    $url .= '&' . $key . '=';
                }
                $url .= $value;
            }
        }
        return $url;
    }

    public static function URL($action, $params = null) {       
        return App::getConf()->action_url . self::_url_maker($action, $params);
    }

    public static function relURL($action, $params = null) {       
        return App::getConf()->action_root . self::_url_maker($action, $params);
    }

    public static function doesLoginExistsInDatabase($login){
        return App::getDB()->has("user",[
            "login" => $login
        ]);
    }
    public static function doesEmailExistsInDatabase($email){
        return App::getDB()->has("user",[
            "e-mail" => $email
        ]);
    }
    public static function doesLoginExistsInDatabaseForUserEdit($id,$login){
        return App::getDB()->has("user",[
            "AND" =>[
                "login" => $login,
                "idUser[!]" => $id
            ]]);
    }
    public static function doesEmailExistsInDatabaseForUserEdit($id,$email){
        return App::getDB()->has("user",[
            "AND" =>[
                "e-mail" => $email,
                "idUser[!]" =>$id
        ]]);
    }
    public static function isUserDeactivated($login){
        return App::getDb()->has("user",[
            "AND" =>[
                "active" => "no",
                "login" => $login
            ]]);
    }
    public static function getUserIdByLogin($login){
        return App::getDB()->get("user", "idUser", [
            "login"=>$login
        ]);
    }
    public static function isBookAvailable($bookId){
        return App::getDB()->has("book",[
            "AND" =>[
                "available" => "yes",
                "idBook" => $bookId
            ]]);
    }


}
