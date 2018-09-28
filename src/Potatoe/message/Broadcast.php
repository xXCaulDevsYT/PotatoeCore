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
            "§7[§dTIP§7] §bDonating helps us grow",
            "§7[§dTIP§7] §bDont give up at pvp remember theres always someone worse than you",
            "§7[§dTIP§7] §bTry out /kits for a epic kit"
        ];
        $details = array_rand($input);
        Server::getInstance()->broadcastMessage(C::GRAY . $input[$details]);
    }
}
