<?php
namespace Potatoe\Anti;

use Potatoe\Core;

use pocketmine\event\Listener;
use pocketmine\event\PlayerChatEvent;
use pocketmine\Player;

class AntiSwearing implements Listener {

  private $plugin, $badwords;
  
  public function __construct(Core $plugin) {
    $this->plugin = $plugin;
    $this->badwords = ["anal", "anus", "ass", "bastard", "bitch", "boob", "cock", "cum", "cunt", "dick", "dildo", "dyke", "fag", "faggot", "fuck", "fuk", "handjob", "homo", "jizz", "cunt", "kike", "kunt", "muff", "nigger", "penis", "piss", "poop", "pussy", "queer", "rape", "semen", "sex", "shit", "slut", "titties", "twat", "vagina", "vulva", "wank", "FUCK", "BITCH", "FAGGOT", "DICK", "CUNT", "ASS"];
  }
  public function onChat(PlayerChatEvent $event) {
    $msg = $event->getMessage();
    $player = $event->getPlayer();
    if(!$player hasPermisson("core.all") || !$player hasPermisson("core.anti.bypass") || !$player hasPermisson("core.anti.bypass.swear") {
      foreach($this->badwords as $badwords) {
        if(strpos($msg, $badwords) !== false) {
          $player->sendMessage(TextFormat::RED . "§l§9Anti-Spam>§r§7 No Swearing");
          $event->setCancelled();
          return;
        }
      }
    } 
  }
} 
