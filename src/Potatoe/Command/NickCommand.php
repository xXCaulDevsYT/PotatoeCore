<?php
namespace Potatoe\Command;

use Potatoe\Core;

use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class NickCommand extends BaseCommand {

  public $nick = [];
  private $plugin;
  
  public function __construct(Core $plugin) {
    $this->plugin = $plugin;
    parent::__construct($plugin, "nick", "Nick Yourself", "/nick", ["nick"]);
  }
  public function execute(CommandSender $sender, $commandLabel, array $args): bool {
  
    if($sender instanceof Player) {
      if($sender->hasPermission("core.all") || !$sender->hasPermission("core.cmd.all") || !$sender->hasPermission("core.cmd.nick")) {
        if(!isset($args[0])) {
          $sender->sendMessage("§9§lNick>§r§7 Use /nick [name]");
     }else{
        if($args[0] == "off") {
          $this->unNick($sender);
          $sender->sendMessage("§9§lNick>§r§7 You Are No Longer Nicked");
        }else{
          $this->nick($sender, $args[0]);
          $sender->sendMessage("§9§lNick>§r§7 You Now Nicked As " . $args[0]);
          
     }
    }
   }else{
     $sender->sendMessage(Core::PERM_RANK);
    }
   }else{
     $sender->sendMessage(Core::USE_IN_GAME);     
   return true;
	   }
  }
  public function nick($player, $nick) {
    if($player instanceof Player){
      $player->setDisplayName($nick);
    }
  }
  public function unNick($player) {
    if($player instanceof Player){
      $player->setDisplayName($player->getName());
    } 
  }
  public function getPlugin(): Plugin {
		return $this->plugin;
	}
  public function getServer() {
		return $this->getPlugin()->getServer();
	}
}
