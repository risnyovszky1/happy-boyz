<?php

namespace app\commands;

use app\models\User;

class SeedController extends \yii\console\Controller
{
    public static $users = [
        ['name' => 'admin', 'email' => 'admin@happyboyz.com', 'is_admin' => true, 'password' => 'admin'],
        ['name' => 'dino', 'email' => 'dino@happyboyz.com', 'is_admin' => false,],
        ['name' => 'kisdino', 'email' => 'kisdino@happyboyz.com', 'is_admin' => false,],
        ['name' => 'csoka', 'email' => 'csoka@happyboyz.com', 'is_admin' => false,],
        ['name' => 'csepa_denisz', 'email' => 'csepa.denisz@happyboyz.com', 'is_admin' => false,],
    ];

    public function actionIndex()
    {
        $this->createUsers();
    }


    public function createUsers()
    {
        foreach (self::$users as $userData) {
            $user = new User();

            $user->name = $userData['name'];
            $user->email = $userData['email'];
            $user->is_admin = $userData['is_admin'];

            $user->password = isset($userData['password'])
                ? $userData['password']
                : '123456';

            $user->save();
        }
    }
}
