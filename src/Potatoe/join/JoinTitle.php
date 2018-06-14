<?php

declare(strict_types=1);

namespace Potatoe\join;

use Potatoe\Core;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\network\mcpe\protocol\LevelEventPacket;

class JoinTitle implements Listener{

    public function onJoin(PlayerJoinEvent $event) : void{
        $player = $event->getPlayer();
        $title = "§l§a> §bDivinium§cMC §a<§r";
        $subtitle = "§7OP Factions";
        $pk = new LevelEventPacket();
        $pk->evid = LevelEventPacket::EVENT_GUARDIAN_CURSE;
        $pk->data = 1;
        $pk->position = $player->asVector3();
        $player->dataPacket($pk);
        $player->addTitle($title, $subtitle);
    }
}
