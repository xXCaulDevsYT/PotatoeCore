<?php
namespace Potatoe;

use Potatoe\Anti\Chat\AntiAdvertising;
use Potatoe\Anti\Chat\AntiSwearing;
use Potatoe\Command\FeedCommand;
use Potatoe\Command\HealCommand;
use Potatoe\Command\NickCommand;
use Potatoe\Command\XYZCommand
use Potatoe\Join\JoinMessage;
use Potatoe\Join\JoinTitle;
use Potatoe\Message\Broadcast;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;

class Core extends PluginBase {

    const PERM_RANK = C::BOLD . C::BLUE . "Permission> " . C::RESET . C::GRAY . "You Need A Rank To Access This Command"
    const PERM_STAFF = C::BOLD . C::BLUE . "Permission> " . C::RESET . C::GRAY . "Only Staff Can Use This Command"
    const USE_IN_GAME = C::BOLD . C::BLUE . "Command> " . C::RESET . C::GRAY . "Use Command In Game"
    
    public function onEnable() {
    
        $this->getServer()->getPluginManager()->registerEvents(($this->antiadvertising = new AntiAdvertising($this)), $this);
        $this->getServer()->getPluginManager()->registerEvents(($this->antiswearing = new AntiSwearing($this)), $this);
    
        $this->getServer()->getCommandMap()->register("feed", new FeedCommand($this));
        $this->getServer()->getCommandMap()->register("heal", new HealCommand($this));
        $this->getServer()->getCommandMap()->register("nick", new NickCommand($this));
        $this->getServer()->getCommandMap()->register("xyz", new XYZCommand($this));
    
        $this->getServer()->getPluginManager()->registerEvents(($this->joinmessage = new JoinMessage($this)), $this);
        $this->getServer()->getPluginManager()->registerEvents(($this->jointitle = new JoinTitle($this)), $this);
    
        $this->getServer()->getScheduler()->scheduleRepeatingTask(new Broadcast($this), 2000, 2000);

    }
}
