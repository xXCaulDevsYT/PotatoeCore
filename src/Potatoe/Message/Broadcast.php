<?php
namespace Potatoe\Message;

use Potatoe\Core;

use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat as C;

class Broadcast extends PluginTask {
  
  public function onRun(/*int*/ $currentTick) {
    $input = [
      "§l§9Tip> §r§7Message 1",
      "§l§9Tip> §r§7Message 2",
      "§l§9Tip> §r§7Message 3"
    ];
    $details = array_rand($input);
    $this->getOwner()->broadcastMessage(C::GRAY . $input[$details]);
  }
}
