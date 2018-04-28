<?php

declare(strict_types=1);

namespace Potatoe;

use Potatoe\anti\AntiAdvertising;
use Potatoe\anti\AntiSwearing;
use Potatoe\command\FeedCommand;
use Potatoe\command\HealCommand;
use Potatoe\command\NickCommand;
use Potatoe\command\SpawnCommand;
use Potatoe\command\VanishCommand;
use Potatoe\command\XYZCommand;
use Potatoe\join\JoinMessage;
use Potatoe\join\JoinTitle;
use Potatoe\message\Broadcast;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;

class Core extends PluginBase{

    const PERM_RANK = C::BOLD . C::BLUE . "Permission> " . C::RESET . C::GRAY . "You Need A Rank To Access This command";
    const PERM_STAFF = C::BOLD . C::BLUE . "Permission> " . C::RESET . C::GRAY . "Only Staff Can Use This command";
    const USE_IN_GAME = C::BOLD . C::BLUE . "command> " . C::RESET . C::GRAY . "Use command In Game";

    /** @var JoinMessage $joinmessage */
    private $joinmessage;
    /** @var JoinTitle $jointitle */
    private $jointitle;

    public function onEnable() : void{
        $this->getServer()->getPluginManager()->registerEvents(($this->antiadvertising = new AntiAdvertising()), $this);
        $this->getServer()->getPluginManager()->registerEvents(($this->antiswearing = new AntiSwearing()), $this);
        $this->getServer()->getCommandMap()->register("feed", new FeedCommand($this));
        $this->getServer()->getCommandMap()->register("heal", new HealCommand($this));
        $this->getServer()->getCommandMap()->register("nick", new NickCommand($this));
        $this->getServer()->getCommandMap()->register("xyz", new XYZCommand($this));
        $this->getServer()->getCommandMap()->register("spawn", new SpawnCommand($this));
        $this->getServer()->getCommandMap()->register("vanish", new VanishCommand($this));
        $this->getServer()->getPluginManager()->registerEvents(($this->joinmessage = new JoinMessage()), $this);
        $this->getServer()->getPluginManager()->registerEvents(($this->jointitle = new JoinTitle()), $this);
        $this->getServer()->getScheduler()->scheduleRepeatingTask(new Broadcast($this), 2000);
    }
}
