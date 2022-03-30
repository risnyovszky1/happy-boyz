<?php

namespace app\commands;

use app\models\Player;
use app\models\Training;
use app\models\User;
use Carbon\Carbon;
use yii\console\ExitCode;
use Yii;

class SeedController extends \yii\console\Controller
{
    public static $users = [
        ['name' => 'admin', 'email' => 'admin@happyboyz.com', 'is_admin' => true, 'password' => 'admin'],
    ];

    public static $players = [
        ['name' => 'Dino'],
        ['name' => 'Kisdino'],
        ['name' => 'Bahick'],
        ['name' => 'Ocsi bacsi'],
        ['name' => 'Losszi'],
    ];

    public function actionIndex()
    {
        $this->createUsers();
        $this->createPlayers();
        $this->createTrainings();

        return ExitCode::OK;
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

    public function createPlayers()
    {
        foreach (self::$players as $playerData) {
            $player = new Player();

            $player->name = $playerData['name'];

            $player->save();
        }
    }

    public function createTrainings()
    {
        $date = Carbon::now()->subMonth()->startOfWeek();

        for($i = 0; $i < 15; $i++) {
            $date->addDay()->setTimeFromTimeString('18:00');
            $this->createTraining($date);
            $date->addDays(3)->setTimeFromTimeString('18:00');
            $this->createTraining($date);

            $date->startOfWeek()->addWeek();
        }
    }

    private function createTraining(Carbon $time)
    {
        $training = new Training();

        $training->name = Yii::t('app', 'Training') . ' ' . $time->format('D j. n.');
        $training->date = $time->format('Y-m-d H:i:s');

        $training->save();
    }
}
