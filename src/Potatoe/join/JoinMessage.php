<?php

declare(strict_types=1);

namespace Potatoe\join;

use Potatoe\Core;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class JoinMessage implements Listener{

    public function onJoin(PlayerJoinEvent $event) : void{
        $player = $event->getPlayer();
        $player->sendMessage("§l§3----------§cAurora§5MC§3----------");
        $player->sendMessage("§bServer§7: §fPvPAurora.ddns.net");
        $player->sendMessage("§bStore§7: §fauroramcpe.buycraft.net");
        $player->sendMessage("§bDiscord§7: §fhc2NqwT");
        $player->sendMessage("§bRules§7: §f/rules");
        $player->sendMessage("§l§3----------------------------------");
    }
}
