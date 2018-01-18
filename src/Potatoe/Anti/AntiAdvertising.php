<?php

declare(strict_types=1);

namespace Potatoe\Anti;

use Potatoe\Core;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;

class AntiAdvertising implements Listener {

    private $links = [".cc", ".net", ".com", ".us", ".co", ".co.uk", ".ddns", ".ddns.net", ".cf", ".me"];

    public function __construct(Core $plugin) {
        #Useless
    }

    public function onChat(PlayerChatEvent $event) {
        $msg = $event->getMessage();
        $player = $event->getPlayer();
        foreach ($this->links as $links) {
            if (strpos($msg, $links) !== false) {
                $player->sendMessage(TextFormat::RED . "§l§9Anti-Ads>§r§7 Please don't advertise on our server.");
                $event->setCancelled(true);
                return;
            }
        }
    }
}