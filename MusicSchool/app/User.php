<?php

namespace App;

use Doctrine\DBAL\Exception\ReadOnlyException;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User implements \Illuminate\Contracts\Auth\Authenticatable
{

    public $id;
    public $user_name ;
    public $password;
    public $account_type;

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return "id";

    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {


        return $this->id;

    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getAuthAccountType()
    {
        return $this->account_type;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }

    public static function authenticate($user_name, $password){
//        $this->user_name = $request['user_name'];
//        $this->password = $request['password'];
//        $this->account_type = $request['account_type'];

        $u = DB::select("SELECT id,user_name, password, account_type FROM user_account WHERE user_name = ? AND password = ? ",[$user_name, $password]);

        if (count($u) == 0){
            return null;
        }



        $user = new User();
        $user->id = $u[0]->id;
        $user->user_name = $u[0]->user_name;
        $user->password = $u[0]->password;
        $user->account_type = $u[0]->account_type;

        return $user;

    }
}
