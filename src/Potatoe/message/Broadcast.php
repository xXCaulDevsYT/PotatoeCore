<?php

declare(strict_types=1);

namespace Potatoe\message;

use Potatoe\Core;

use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat as C;

class Broadcast extends PluginTask{

    public function onRun(int $currentTick) : void{
        /** @var array $input */
        $input = [
            "§e- §bThink of it you might not be the best at Minecraft but theres always someone worse",
            "§e- §bDid you know donating is what keeps us up and running",
            "§e- §bThank you for playing CubeX Network"
        ];
        $details = array_rand($input);
        Server::getInstance()->broadcastMessage(C::GRAY . $input[$details]);
    }
}
