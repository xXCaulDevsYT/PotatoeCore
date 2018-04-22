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
                $player->sendMessage(TextFormat::RED . "§l§9Anti-Ads>§r§7 Please don't advertise on our server.");
                $event->setCancelled(true);
                return;
            }
        }
    }
}