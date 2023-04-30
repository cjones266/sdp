<!-- Log In adapted from: https://www.youtube.com/watch?v=BaEm2Qv14oU-->

<?php

class Login extends Dbh {

    protected function getUser($uid, $pwd) {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');

        if(!$stmt->execute(array($uid, $uid))){
            $stmt = null;
            header("location: ..index/php?error=stmtfailed");
            exit();
        }

        $loginData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($loginData ) == 0) {
            $stmt = null;
            header("location: login.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $loginData[0]["users_pwd"];
        $checkPwd = password_verify($pwd, $pwdHashed);

        if($checkPwd == false)
        {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        elseif($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');
            
            if(!$stmt->execute(array($uid, $uid, $pwdHashed))){
                $stmt = null;
                header("location: ..index/php?error=stmtfailed");
                exit();
            }
            
            $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($userData) == 0) {
                $stmt = null;
                header("location: login.php?error=usernotfound");
                exit();
            }

            session_start();
            $_SESSION["userid"] = $userData[0]["users_id"];
            $_SESSION["useruid"] = $userData[0]["users_uid"];
            
            // Optional code - redirect to desired page?
            //header("Location: ../landing.php");
            //exit();

            $stmt = null;

            return $userData;
        }
    }
}