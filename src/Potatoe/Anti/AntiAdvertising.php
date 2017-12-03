<?php
namespace Potatoe\Anti;

use Potatoe\Core;

use pocketmine\event\Listener;
use pocketmine\event\player/PlayerChatEvent;
use pocketmine\Player;

class AntiAdvertising implements Listener {

  private $plugin, $links;
  
  public function __construct(Core $plugin) {
    $this->plugin = $plugin;
    $this->links = [".leet.cc", ".net", ".com", ".us", ".co", ".co.uk", ".ddns", ".ddns.net", ".cf", "hybridpe", "cosmicpe", "astoria"];
  }
  public function onChat(PlayerChatEvent $event) {
    $msg = $event->getMessage();
    $player = $event->getPlayer();
      foreach($this->links as $links) {
        if(strpos($msg, $links) !== false) {
          $player->sendMessage(TextFormat::RED . "§l§9Anti-Spam>§r§7 No Swearing");
          $event->setCancelled();
          return;
      }
    } 
  }
} 
