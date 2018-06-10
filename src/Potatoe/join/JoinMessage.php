<?php

declare(strict_types=1);

namespace Potatoe\join;

use Potatoe\Core;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class JoinMessage implements Listener{

    public function onJoin(PlayerJoinEvent $event) : void{
        $player = $event->getPlayer();
        $player->sendMessage("§d--------------§b=============");
        $player->sendMessage("§aActivated Plugin§e Core by EmeraldassasinYT");
    }
}
