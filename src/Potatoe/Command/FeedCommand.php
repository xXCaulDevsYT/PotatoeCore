<?php
namespace Potatoe\Command;

use Potatoe\Core;

use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class FeedCommand extends BaseCommand {

  private $plugin;
  
  public function __construct(Core $plugin) {
    $this->plugin = $plugin;
    parent::__construct($plugin, "feed", "Feed Yourself", "/feed", ["feed"]);
  }
  public function execute(CommandSender $sender, $commandLabel, array $args): bool {
  
    if($sender instanceof Player) {
      if(!$sender->hasPermission("core.all") || !$sender->hasPermission("core.cmd.all") || !$sender->hasPermission("core.cmd.feed")) {
        $sender->sendMessage(Core::PERM_RANK);
     }else{
        $sender->setFood(20);
        $sender->sendMessage("§l§9Feed> §r§7You Have Been Fed");
     }
    }
   else{
     $sender->sendMessage(Core::USE_IN_GAME);
   }
   return true;
  }
  public function getPlugin(): Plugin {
		return $this->plugin;
	}
  public function getServer() {
		return $this->getPlugin()->getServer();
	}
}
