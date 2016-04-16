<?php

namespace EmotionsPE;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\command\CommandExecutor;

use pocketmine\event\Listener;

use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\Server;

use pocketmine\utils\TextFormat;

use pocketmine\utils\Config;

use pocketmine\permission\ServerOperator;

class Main extends PluginBase implements Listener{

public function onEnable(){

$this->getServer()->getPluginManager()->registerEvents($this, $this);

$this->saveDefaultConfig();

$this->getLogger()->info(TextFormat::GREEN . "EmotionsPE" . TextFormat::YELLOW . " by paetti loaded. Coded by paetti. Instagram: xPaetti Kik: Oupsay");

}

/**
   *  ________      ________    _________    ___________   ___________    ___________
   * |   ___  \    |  ____  |  | ________|  |____   ____| |____   ____|  |____   ____|
   * |  |___|  |   | |____| |  | |               | |           | |            | |
   * |  ______/    |  ____  |  | |_______        | |           | |            | |
   * | |           | |    | |  |  _______|       | |           | |            | |
   * | |           | |    | |  | |_______        | |           | |        ____| |____
   * |_|           |_|    |_|  |_________|       |_|           |_|       |___________|
**/

 

public function onDisable(){

$this->getLogger()->info(TextFormat::GREEN . "EmotionsPE disabled.");

}

 

public function onCommand(CommandSender $sender, Command $command, $label, array $args){

switch($command->getName()){

/**

**/

case "emotionspe":

    $sender->sendMessage("Â§aEmotionsPE v1.0.0 by paetti. Instagram: xPaetti");

return true;

case "hug":

$name = \strtolower(\array_shift($args));

$player = $sender->getServer()->getPlayer($name);

if($player === $sender){

$sender->sendMessage("You can't hug yourself!");

return \true;

}

 

if($player instanceof Player){

$sender->sendMessage(TextFormat::RED . "<3 You hug " . $player->getName() . " <3 ");

$player->sendMessage(TextFormat::RED . "<3" . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " hugs you <3 ");

}else{

$sender->sendMessage("Â§cUsage: /hug <Player>");

return true;

}

case "hugall":
    
    $sender->getServer()->broadcastMessage(TextFormat::RED . "<3 " . $sender->getName() . " hugs you <3 ");

    return true;

case "kiss":

$name = \strtolower(\array_shift($args));

$player = $sender->getServer()->getPlayer($name);

if($player === $sender){

$sender->sendMessage("You can't kiss yourself!");

return true;

}

 

if($player instanceof Player){

$sender->sendMessage(TextFormat::DARK_PURPLE . "<3 You kiss " . $player->getName() . " <3 ");

$player->sendMessage(TextFormat::DARK_PURPLE . "<3 " . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " kisses you <3 ");

}else{

$sender->sendMessage("Â§cUsage: /kiss <Player>");

}

case "kissall":
    
    $sender->getServer()->broadcastMessage(TextFormat::DARK_PURPLE . "<3 " . $sender->getName() . " kisses you <3 ");

    return true;
case "beat":

$name = \strtolower(\array_shift($args));

$player = $sender->getServer()->getPlayer($name);

if($player === $sender){

$sender->sendMessage("You can't beat yourself!");

return true;

}

 

if($player instanceof Player){

$sender->sendMessage(TextFormat::DARK_RED . "!! You beat " . $player->getName() . " !!");

$player->sendMessage(TextFormat::DARK_RED . "!! " . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " beats you !! ");

}else{

$sender->sendMessage("Â§cUsage: /beat <Player>");

}

case "beatall":
    
    $sender->getServer()->broadcastMessage(TextFormat::DARK_RED . "!! " . $sender->getName() . " beats you !!");
    
    return true;
    
case "slap":

$name = \strtolower(\array_shift($args));

$player = $sender->getServer()->getPlayer($name);

if($player === $sender){

$sender->sendMessage("You can't slap yourself!");

return true;

}

 

if($player instanceof Player){

$sender->sendMessage(TextFormat::YELLOW . ":D You slap " . $player->getName() . " :D");

$player->sendMessage(TextFormat::YELLOW . ":D " . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " slaps you :D");

}else{

$sender->sendMessage("Â§cUsage: /slap <Player>");

}

case "slapall":
    
    $sender->getServer()->broadcastMessage(TextFormat::YELLOW . ":D " . $sender->getName() . " slaps you :D");

    return true;
    
case "happy":
    
    $sender->getServer()->broadcastMessage(TextFormat::YELLOW . $sender->getName() . " is happy! :)");

    return true;
    
case "sad":
    
    $sender->getServer()->broadcastMessage(TextFormat::DARK_BLUE. $sender->getName() . " is sad :(");

    return true;
    
case "ill":
    
    $sender->getServer()->broadcastMessage(TextFormat::BLUE. $sender->getName() . " is ill :/");

    return true;
  
case "crazy":
    
    $sender->getServer()->broadcastMessage(TextFormat::GREEN. $sender->getName() . " is crazy! :P");

    return true;
    
case "angry":
    
    $sender->getServer()->broadcastMessage(TextFormat::DARK_RED. $sender->getName() . " is angry! -.-");

    return true;
   
case "mad":
    
    $sender->getServer()->broadcastMessage(TextFormat::RED. $sender->getName() . " is mad!");

    return true;
    

    
}
}
}
