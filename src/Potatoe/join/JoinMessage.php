<?php

declare(strict_types=1);

namespace Potatoe\join;

use Potatoe\Core;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class JoinMessage implements Listener{

    public function onJoin(PlayerJoinEvent $event) : void{
        $player = $event->getPlayer();
        $player->sendMessage("§l§e--------------------§6====================§r");
        $player->sendMessage("§l§c >§bWelcome To §dC§5u§ab§2e§7X§r");
        $player->sendMessage("§l§b --§9 VOTE§r: https://votelink");
        $player->sendMessage("§l§a --§5 STORE§r: Store Link");
        $player->sendMessage("§l§d --§e DISCORD§r: Discord Link");
        $player->sendMessage("§l§3 --§2 NEWS§r: §7Plugin Made By EmeraldAssasinYT");
        $player->sendMessage("§l§7 --§1 ServerIP§r: play.cubexmcpe.com");
        $player->sendMessage("§l§e--------------------§6====================§r");
    }
}
