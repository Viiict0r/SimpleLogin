<?php

require 'config.php';

class UserLogin {

    /*
     *  Função valid
     *  Verifica no banco de dados se o usuário e a senha existem e coincidem.
     *
     * @param $user Recebe o nome do usuário.
     * @param $password Recebe a senha do usuário.
     * @return boolean
     */
    public function valid($user, $password) {
        global $db;
        $query = "SELECT * FROM users WHERE user=:user AND senha=:password";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":user", $user);
        $stmt->bindValue(":password", md5($password));
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

}