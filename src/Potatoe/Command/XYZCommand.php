<?php
namespace Potatoe\Command;

use Potatoe\Core;

use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class XYZCommand extends BaseCommand {

  private $plugin;
  
  public function __construct(Core $plugin) {
    $this->plugin = $plugin;
    parent::__construct($plugin, "xyz", "Check Your XYZ", "/xyz", ["xyz"]);
  }
  public function execute(CommandSender $sender, $commandLabel, array $args): bool {
  
    (!isset($args[0])) {
      $sender->sendMessage("§l§9Coords>§r§7 You're Standing At");
      $sender->sendMessage("§7 X - " . round($sender->getX()));
      $sender->sendMessage("§7 Y - " . round($sender->getY()));
      $sender->sendMessage("§7 Z - " . round($sender->getZ()));
    }
   }else{
     $sender->sendMessage(Core::USE_IN_GAME);
   }
  }
  public function getPlugin(): Plugin {
		return $this->plugin;
	}
  public function getServer() {
		return $this->getPlugin()->getServer();
	}
}
