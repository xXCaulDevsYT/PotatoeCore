<?php

declare(strict_types=1);

namespace Potatoe\join;

use Potatoe\Core;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class JoinMessage implements Listener{

    public function onJoin(PlayerJoinEvent $event) : void{
        $player = $event->getPlayer();
        $player->sendMessage("§l§6» §aWelcome To §bCube§dX §aNetwork §c!");
        $player->sendMessage("§e- §3Twitter: <Vote Link>");
        $player->sendMessage("§e- §3Store: <buycraft link>");
        $player->sendMessage("§e- §3Discord: <discord link>");
        $player->sendMessage("§e- §3Hub: <play.cubexmcpe.com");
        $player->sendMessage("§e- §bCheck our rules with /rules");
        $player->sendMessage("§e- §bTrade In vote Points For Prizes");
        $player->sendMessage("");
        $player->sendMessage("§bCube§cX §aAuthentcation §l§6» §r§7 You Have Successfully Been");
        $player->sendMessage("§7Logged In By Your Personal IP Adress");
    }
}
