<?php

declare(strict_types=1);

namespace Potatoe\command;

use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\utils\TextFormat;
use Potatoe\Core;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class VanishCommand extends BaseCommand{

    /** @var Core $plugin */
    private $plugin;

    public function __construct(Core $plugin){
        $this->plugin = $plugin;
        parent::__construct($plugin, "vanish", "Vanish from players", "/vanish", ["vanish"]);
    }

    public function execute(CommandSender $sender, $commandLabel, array $args) : bool{
        if(!$sender instanceof Player){
            $sender->sendMessage(Core::USE_IN_GAME);
            return false;
        }
        if(!$sender->hasPermission("core.all") || !$sender->hasPermission("core.cmd.all") || !$sender->hasPermission("core.cmd.vanish")){
            $sender->sendMessage(Core::PERM_RANK);
            return false;
        }
        if(!$sender->hasEffect(Effect::INVISIBILITY)){
            $sender->addEffect(new EffectInstance(Effect::getEffect(Effect::INVISIBILITY), 99999, 0, false));
            $sender->sendMessage(TextFormat::GREEN . "You have now been vanished");
        }else{
            $sender->removeEffect(Effect::INVISIBILITY);
            $sender->sendMessage(TextFormat::RED . "You have now been unvanished");
        }
        return true;
    }
}