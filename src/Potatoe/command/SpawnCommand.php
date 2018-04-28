<?php

declare(strict_types=1);

namespace Potatoe\command;

use pocketmine\utils\TextFormat;
use Potatoe\Core;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class SpawnCommand extends BaseCommand{

    /** @var Core $plugin */
    private $plugin;

    public function __construct(Core $plugin){
        $this->plugin = $plugin;
        parent::__construct($plugin, "spawn", "Teleport to spawn", "/spawn", ["hub", "lobby", "spawn"]);
    }

    public function execute(CommandSender $sender, $commandLabel, array $args) : bool{
        if(!$sender instanceof Player){
            $sender->sendMessage(Core::USE_IN_GAME);
            return false;
        }
        if(!$sender->hasPermission("core.all") || !$sender->hasPermission("core.cmd.all") || !$sender->hasPermission("core.cmd.spawn")){
            $sender->sendMessage(Core::PERM_RANK);
            return false;
        }
        $sender->teleport($this->plugin->getServer()->getDefaultLevel()->getSafeSpawn());
        $sender->sendMessage(TextFormat::GREEN . "You have been teleported to spawn");
        return true;
    }
}