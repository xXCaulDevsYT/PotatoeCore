<?php
namespace Potatoe\Join;

use Potatoe\Core;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use pocketmine\Player;
use pocketmine\Server;

class JoinTitle implements Listener {

  public function onJoin(PlayerJoinEvent $event) {
    $player = $event->getPlayer();
    $title = "Welcome";
    $subtitle = "To The Server";
    $pk = new LevelEventPacket();
    $pk->evid = LevelEventPacket::EVENT_GUARDIAN_CURSE;
    $pk->data = 1;
    $pk->position = $this->player->asVector3();
    $this->player->dataPacket($pk);
    $player->addTitle($title, $subtitle);
  }
}
