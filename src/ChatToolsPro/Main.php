<?php

namespace ChatToolsPro;

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

$this->getLogger()->info(TextFormat::AQUA . "ChatToolsPro by paetti loaded. Coded by paetti. Instagram: xPaetti Kik: Oupsay");

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

$this->getLogger()->info(TextFormat::AQUA . "ChatToolsPro disabled.");

}

 

public function onCommand(CommandSender $sender, Command $command, $label, array $args){

switch($command->getName()){

/**

**/

case "chattoolspro":

 

$sender->sendMessage("Â§aChatToolsPro v1.0.1 by paetti. Instagram: xPaetti");

return true;

 

case "announcement":

    $sender->sendMessage("Â§aMessage announced sucessfully!");

    $sender->getServer()->broadcastMessage(TextFormat::AQUA . "[Announcement] " . implode(" ", $args));

return true;

case "serversay":

$sender->getServer()->broadcastMessage(TextFormat::LIGHT_PURPLE . "[Server] " . implode(" ", $args));

return true;

case "staffsay":

    $sender->getServer()->broadcastMessage(TextFormat::YELLOW . "[Staff] " . TextFormat::RED . implode(" ", $args));

return true;

case "support":
    
    $sender->getServer()->broadcastMessage(TextFormat::YELLOW . TextFormat::BOLD . "[Support] " .TextFormat::RESET . TextFormat::AQUA . implode(" ", $args));

return true;

case "warning":

    $sender->getServer()->broadcastMessage(TextFormat::DARK_RED . "[Warning] " . implode(" ", $args));

return true;

case "alert":

    $sender->getServer()->broadcastMessage(TextFormat::RED . "[ALERT] " . implode(" ", $args));

return true;

case "info":

    $sender->getServer()->broadcastMessage(TextFormat::AQUA . "[Info] " . implode(" ", $args));

return true;

case "chatsay":

    if(!(isset($args[0]))){

return false;

}

$sender->getServer()->broadcastMessage(implode(" ", $args));

return true;

 

case "warn":

$name = \strtolower(\array_shift($args));

$player = $sender->getServer()->getPlayer($name);

if($player === $sender){

$sender->sendMessage("You can't warn yourself!");

return \true;

}

 

if($player instanceof Player){

    $sender->sendMessage("Â§4[Warning" . " -> " . $player->getDisplayName() . "] " . "Â§c" . implode(" ", $args));

    $player->sendMessage("Â§4[Warning" . " -> ".$player->getName()."] " . implode(" ", $args));

}else{

    $sender->sendMessage("Â§cUsage: /warn <Player> <Reason>");
Return true;
}

return true;

case "vmsg":

    $name = \strtolower(\array_shift($args));

    $player = $sender->getServer()->getPlayer($name);

if($player === $sender){

$sender->sendMessage("You can't write yourself!");

return \true;

}

 

if($player instanceof Player){

    $sender->sendMessage("Â§e[ -> " . $player->getDisplayName() . "] " . "Â§f" . implode(" ", $args));

    $player->sendMessage("Â§e[ -> ".$player->getName()."] " . "Â§f" . implode(" ", $args));

}else{

    $sender->sendMessage("Â§cUsage: /vmsg <Player> <Message>");

}

return true;

case "tipgive":

$name = \strtolower(\array_shift($args));

$player = $sender->getServer()->getPlayer($name);

if($player === $sender){

    $sender->sendMessage("You can't give yourself an tip!");

return \true;

}

 

if($player instanceof Player){

    $sender->sendMessage("Â§e[Tip by " . $sender->getName() . " -> you] " . implode(" ", $args));

    $player->sendMessage("Â§e[Tip by " . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " -> you] " . implode(" ", $args));

}else{

    $sender->sendMessage("Â§cUsage: /tipgive <Player> <Tip>");

}
Return true;
case "spammsg":

$name = \strtolower(\array_shift($args));

$player = $sender->getServer()->getPlayer($name);

if($player === $sender){

    $sender->sendMessage(TextFormat::RED . "You can't send yourself an SpamMessage!");

return \true;

}

if($player instanceof Player){

    $sender->sendMessage(TextFormat::GREEN . "Spammed message to target sucessfully!");

    $player->sendMessage("Â§e[SpamMessage -> you] " . implode(" ", $args));
    $player->sendMessage("Â§e[SpamMessage -> you] " . implode(" ", $args));
    $player->sendMessage("Â§e[SpamMessage -> you] " . implode(" ", $args));
    $player->sendMessage("Â§e[SpamMessage -> you] " . implode(" ", $args));
    $player->sendMessage("Â§e[SpamMessage -> you] " . implode(" ", $args));
    $player->sendMessage("Â§e[SpamMessage -> you] " . implode(" ", $args));
    $player->sendMessage("Â§e[SpamMessage -> you] " . implode(" ", $args));
    $player->sendMessage("Â§e[SpamMessage -> you] " . implode(" ", $args));
    $player->sendMessage("Â§e[SpamMessage -> you] " . implode(" ", $args));
    $player->sendMessage("Â§e[SpamMessage -> you] " . implode(" ", $args));
    $player->sendMessage("Â§e[SpamMessage -> you] " . implode(" ", $args));
    

}else{

    $sender->sendMessage(TextFormat::RED . "Usage: /spammsg <Player> <Message>");

}
Return true;

case "setnick":

if (!($sender instanceof Player)){

$sender->sendMessage("Â§a This command is only avaible In-Game!");

return true;

}

$sender->sendMessage("Â§aNick set sucessfully.");

$sender->setDisplayName(implode(" ", $args));

return true;

 

case "sayas":

$name = \strtolower(\array_shift($args));

 

$sender->sendMessage(TextFormat::GREEN . "Sended Message as " . $name);

$sender->getServer()->broadcastMessage("<" . $name . "> " . implode(" ", $args));

 

return true;

case "spam":

$sender->getServer()->broadcastMessage(TextFormat::AQUA . "SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM");

$sender->getServer()->broadcastMessage(TextFormat::AQUA . "SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM");

$sender->getServer()->broadcastMessage(TextFormat::AQUA . "SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM");

$sender->getServer()->broadcastMessage(TextFormat::AQUA . "SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM");

$sender->getServer()->broadcastMessage(TextFormat::AQUA . "SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM");

$sender->getServer()->broadcastMessage(TextFormat::AQUA . "SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM");

$sender->getServer()->broadcastMessage(TextFormat::AQUA . "SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM");

$sender->getServer()->broadcastMessage(TextFormat::AQUA . "SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM SPAM");

return true;

case "clearchat":

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::YELLOW. "[ClearChat]");

$sender->getServer()->broadcastMessage(TextFormat::AQUA . "[ChatToolsPro] ".TextFormat::RED."Chat cleared.");

 

return true;

case "helpme":

if (!($sender instanceof Player)){

$sender->sendMessage("Â§a This command is only avaible In-Game!");

return true;

}

$sender->sendMessage("Â§a Type /done if you don't need help anymore.");

$sender->setDisplayName(TextFormat::RED . "[NeedsHelp] ".$sender->getDisplayName());

return true;

case "done":

if (!($sender instanceof Player)){

$sender->sendMessage("Ã‚Â§a This command is only avaible In-Game!");

return true;

}

$sender->setDisplayName(str_replace(TextFormat::RED . "[NeedsHelp]", "", $sender->getDisplayName()));

$sender->sendMessage("Â§a Type /helpme if you need help again.");

return true;

case "ip":

$name = \strtolower(\array_shift($args));

$player = $sender->getServer()->getPlayer($name);

if(!(isset($args[0]))){

$sender->sendMessage(TextFormat::RED."Usage: /ip <Player>");

return true;

} else {
$sender->sendMessage(TextFormat::GREEN . "-----");
$sender->sendMessage(TextFormat::GREEN . "IP of " . $player->getDisplayName() . " : " . $player->getAddress() . "");
$sender->sendMessage(TextFormat::GREEN . "Port of " . $player->getDisplayName() . " : " . $player->getPort() . "");
$sender->sendMessage(TextFormat::GREEN . "-----");
return true;

}
 

case "report":

$name = \strtolower(\array_shift($args));

$player = $sender->getServer()->getPlayer($name);

if(!(isset($args[0]))){

$sender->sendMessage(TextFormat::RED."Usage: /report <Player> <Reason>");

return true;

}

if (!($sender instanceof Player)){

$sender->sendMessage("Â§cThis Command in only avaible In-Game");

return true;

}

if(count($args) < 1){

foreach($this->getServer()->getOnlinePlayers() as $p){

if($p->isOnline() && $p->isOp()){

if($player instanceof Player){

$p->sendMessage(TextFormat::DARK_RED."[Report] ".TextFormat::AQUA."Player ".$sender->getName()." reported ".TextFormat::RED.$player->getDisplayName().TextFormat::AQUA." for ".TextFormat::DARK_RED.implode("", $args));

 

$sender->sendMessage(TextFormat::DARK_RED."[Report] ".TextFormat::AQUA."Report sended to an OP!");

return true;

}else{

$sender->sendMessage(TextFormat::DARK_RED."[Report] ".TextFormat::AQUA."No OP's are online.");

return true;

}

}else{

$sender->sendMessage(TextFormat::RED."Player not online!");
Return true;
}

}

 

}else if($sender->hasPermission("chattoolspro.report")){

 

foreach($this->getServer()->getOnlinePlayers() as $p){

if($p->isOnline() && $p->isOp()){

if($player instanceof Player){

$p->sendMessage(TextFormat::DARK_RED."[Report] ".TextFormat::AQUA."Player ".$sender->getName()." reported ".TextFormat::RED.$player->getDisplayName().TextFormat::AQUA." for ".TextFormat::DARK_RED.implode("", $args));

 

$sender->sendMessage(TextFormat::DARK_RED."[Report] ".TextFormat::YELLOW."Report sended");

return true;

}else{

$sender->sendMessage(TextFormat::DARK_RED."[Report] ".TextFormat::AQUA."This Player is not online! Your Report haven't been sended.");

return true;

}

}else{

$sender->sendMessage(TextFormat::RED."Player not online!");
Return true;
}

}

}else{

$sender->sendMessage(TextFormat::RED."No Permission!");

return true;

}

 

 

 

case "ops":

 

$ops = "";

if($sender->hasPermission("chattoolspro.ops")){

foreach($this->getServer()->getOnlinePlayers() as $p){

if($p->isOnline() && $p->isOp()){

$ops = $p->getName()." , ";

$sender->sendMessage(TextFormat::AQUA."OPs online:\n".substr($ops, 0, -2));

return true;

}else{

$sender->sendMessage(TextFormat::AQUA."OPs online: \n");

return true;

}

}

}else{

$sender->sendMessage(TextFormat::RED."No Permission!");

return true;

}

}

}

 

public function getMsg($words){

return implode(" ",$words);

 

}

 

}

/*

* Coded by paetti

*/

  
