<?php

declare(strict_types=1);

namespace Potatoe\join;

use Potatoe\Core;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class JoinMessage implements Listener{

    public function onJoin(PlayerJoinEvent $event) : void{
        $player = $event->getPlayer();
        $player->sendMessage("§€");
        $player->sendMessage("§l§6» §aWelcome To §bDivinium§dMC §aNetwork §c!");
        $player->sendMessage("§e- §3Vote: <>");
        $player->sendMessage("§e- §3Store: <>");
        $player->sendMessage("§e- §3Discord: <https://discord.gg/bpfjN25>");
        $player->sendMessage("§e- §3Playing: <FactionsOP 1>");
        $player->sendMessage("§e- §bCheck our rules with /rules");
        $player->sendMessage("§e- §bTrade In vote Points For Prizes");
        $player->sendMessage("§€");
        $player->sendMessage("§bDivinium§cMC §aIP Logger §l§6» §r§7 You Have Successfully Been");
        $player->sendMessage("§7Logged By Your Personal IP Address");
        $player->sendMessage("§€");
        $player->sendMessage("§e- §6Make Sure to Read are Rules before playing!");
        $player->sendMessage("§e- §6Voting Gets You Alot Of Items & Cool Gadgets!");
        $player->sendMessage("§e- §6Donating Rewards you Will Cool Perks / Abilities & Features");
        $player->sendMessage("§€");
    }
}
