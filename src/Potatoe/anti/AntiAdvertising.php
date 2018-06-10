<?php

declare(strict_types=1);

namespace Potatoe\anti;

use pocketmine\utils\TextFormat;
use Potatoe\Core;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;

class AntiAdvertising implements Listener{

    /** @var array $links */
    private $links = [".cc", ".net", ".com", ".us", ".co", ".co.uk", ".ddns", ".ddns.net", ".cf", ".me"];

    public function onChat(PlayerChatEvent $event) : void{
        $msg = $event->getMessage();
        $player = $event->getPlayer();
        foreach($this->links as $links){
            if(strpos($msg, $links) !== false){
                $player->sendMessage(TextFormat::RED . "§l§7[§bX-BOT§7]§r§e> §7Hi I Am A Personal Intelligence Anti Advertising Bot Stop Advertising Or you will be banned");
                $event->setCancelled(true);
                return;
            }
        }
    }
}
