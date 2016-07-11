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
/**
 *  ____     ______    ______    _________   _________     _______
 * |  _ \   |  __  |  |  ____|  |___   ___| |___   ___|   |__   __|
 * | |_) /  | |__| |  | |____       | |         | |          | |
 * |  __/   |  __  |  |  ____|      | |         | |          | |
 * | |      | |  | |  | |____       | |         | |        __| |__
 * |_|      |_|  |_|  |______|      |_|         |_|       |_______|
 * Plugin coded by paetti.
 * This Label is by paetti.
**/
class Main extends PluginBase implements Listener{
	public $prefix = TextFormat::GREEN."[ChatToolsPro]".TextFormat::YELLOW." ";
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
        $this->getLogger()->info(TextFormat::AQUA . "ChatToolsPro by paetti loaded. Coded by paetti. Instagram: xPaetti Kik: Oupsay");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::AQUA . "ChatToolsPro disabled.");
    }
        public function onChat(PlayerChatEvent $event) {
    
      if(!($event->getPlayer()->hasPermission("chattoolspro.lockchat"))) {
      
        if($this->disableChat) {
        
          $event->setCancelled(true);
          
          $event->getPlayer()->sendMessage(TextFormat::GREEN."[ChatToolsPro]" . TextFormat::YELLOW . "The Chat is currently disabled!");
          
        }
        
      }
      
    }
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        switch($command->getName()){

            case "chattoolspro":
                if(!(isset($args[0]))){
                $sender->sendMessage(TextFormat::GREEN . "ChatToolsPro v1.1 coded by paetti. Kik: Oupsay");
                $sender->sendMessage(TextFormat::GREEN . "/chattoolspro <1/2/3/4/5> for help");
               
      
           
                    return true;
                }
            if($args[0] == "1"){
                $sender->sendMessage(TextFormat::GREEN . "Page 1 of 4 Help Pages");
                $sender->sendMessage(TextFormat::GREEN . "/announcement " . TextFormat::WHITE . "Broadcast Message with [Announcement] Tag");
                $sender->sendMessage(TextFormat::GREEN . "/serversay " . TextFormat::WHITE . "Broadcast Message with [Server] Tag");
                $sender->sendMessage(TextFormat::GREEN . "/staffsay " . TextFormat::WHITE . "Broadcast Message with [Staff] Tag");
                $sender->sendMessage(TextFormat::GREEN . "/support " . TextFormat::WHITE . "Broadcast Message with [Support] Tag");
                $sender->sendMessage(TextFormat::GREEN . "/warning " . TextFormat::WHITE . "Broadcast Message with [Warning] Tag");
                $sender->sendMessage(TextFormat::GREEN . "/alert" . TextFormat::WHITE . "Broadcast Message with [ALERT] Tag");
                return true;
            }
            elseif($args[0] == "2"){
                $sender->sendMessage(TextFormat::GREEN . "Page 2 of 4 Help Pages");
                $sender->sendMessage(TextFormat::GREEN . "/info " . TextFormat::WHITE . "Broadcast Message with [Info] Tag");
                $sender->sendMessage(TextFormat::GREEN . "/chatsay " . TextFormat::WHITE . "Broadcast Message without any Tag");
                $sender->sendMessage(TextFormat::GREEN . "/warn " . TextFormat::WHITE . "Warn a Player");
                $sender->sendMessage(TextFormat::GREEN . "/vmsg " . TextFormat::WHITE . "Send a anonymous Message to a Player");
                $sender->sendMessage(TextFormat::GREEN . "/tipgive " . TextFormat::WHITE . "Give a Tip to a Player");
                $sender->sendMessage(TextFormat::GREEN . "/hug " . TextFormat::WHITE . "Hug a Player");
                return true;
            }
        elseif($args[0] == "3"){
                $sender->sendMessage(TextFormat::GREEN . "Page 3 of 4 Help Pages");
                $sender->sendMessage(TextFormat::GREEN . "/setnick " . TextFormat::WHITE . "Set a nick");
                $sender->sendMessage(TextFormat::GREEN . "/sayas " . TextFormat::WHITE . "Say a Message as another Player");
                $sender->sendMessage(TextFormat::GREEN . "/spam " . TextFormat::WHITE . "Spam");
                $sender->sendMessage(TextFormat::GREEN . "/clearchat " . TextFormat::WHITE . "Clears the Chat");
                $sender->sendMessage(TextFormat::GREEN . "/spamsay " . TextFormat::WHITE . "Spams a Message");
                $sender->sendMessage(TextFormat::GREEN . "/spammsg " . TextFormat::WHITE . "Send a Message more times to a Player");
                return true;
        }
        elseif($args[0] == "4"){
                $sender->sendMessage(TextFormat::GREEN . "Page 4 of 4 Help Pages");
                $sender->sendMessage(TextFormat::GREEN . "/helpme " . TextFormat::WHITE . "Adds [NeedsHelp] Tag to Name");
                $sender->sendMessage(TextFormat::GREEN . "/done " . TextFormat::WHITE . "Remove [NeedsHelp] Tag from Name");
                $sender->sendMessage(TextFormat::GREEN . "/report " . TextFormat::WHITE . "Report a Player");
                $sender->sendMessage(TextFormat::GREEN . "/ops " . TextFormat::WHITE . "Lists online OP's");
                $sender->sendMessage(TextFormat::GREEN . "/opfake " . TextFormat::WHITE . "Fake op somebody");
                $sender->sendMessage(TextFormat::GREEN . "/deopfake " . TextFormat::WHITE . "Fake Deop somebody");
                $sender->sendMessage(TextFormat::GREEN . "/checkop " . TextFormat::WHITE . "Check if a Player is OP or not");
                return true;
        }
                break;
                // Broadcasting Features
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
                // UP - Broadcasting Features
            case "warn":
                $name = \strtolower(\array_shift($args));

		$player = $sender->getServer()->getPlayer($name);

                if($player === $sender){
			$sender->sendMessage("You can't warn yourself!");
			return \true;
		}
		
                if($player instanceof Player){
			$sender->sendMessage(TextFormat::DARK_RED . "[Warning" . " -> " . $player->getDisplayName() . "] " . "Â§c" . implode(" ", $args));
			$player->sendMessage(TextFormat::DARK_RED . "[Warning" . " -> ".$player->getName()."] " . implode(" ", $args));
		}else{
			$sender->sendMessage(TextFormat::RED . "Usage: /warn <Player> <Reason>");
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
			$sender->sendMessage(TextFormat::YELLOW . "[ -> " . $player->getDisplayName() . "] " . TextFormat::WHITE . implode(" ", $args));
			$player->sendMessage(TextFormat::YELLOW . "[ -> ".$player->getName()."] " . TextFormat::WHITE . implode(" ", $args));
		}else{
			$sender->sendMessage(TextFormat::RED . "Usage: /vmsg <Player> <Message>");
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
			$sender->sendMessage(TextFormat::YELLOW . "[Tip by " .  $sender->getName() . "  -> ".$player->getName." ] " . implode(" ", $args));
			$player->sendMessage(TextFormat::YELLOW . "[Tip by " . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " -> you] " . implode(" ", $args));
		}else{
			$sender->sendMessage("Â§cUsage: /tipgive <Player> <Tip>");
		}
                return true;
                case "hug":
                $name = \strtolower(\array_shift($args));

		$player = $sender->getServer()->getPlayer($name);

                if($player === $sender){
			$sender->sendMessage("You can't hug yourself!");
			return \true;
		}
		
                if($player instanceof Player){
			$sender->sendMessage(TextFormat::RED . "<3 You hug " . $player->getDisplayName() . " <3");
			$player->sendMessage(TextFormat::RED . "<3 " . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " hugs you <3 ");
		}else{
			$sender->sendMessage("Â§cUsage: /hug <Player>");
		}
                return true;
                case "opfake":
                $name = \strtolower(\array_shift($args));

		$player = $sender->getServer()->getPlayer($name);

                if($player === $sender){
			$sender->sendMessage("You can't fake op yourself!");
			return \true;
		}
		
                if($player instanceof Player){
			$sender->sendMessage(TextFormat::GREEN . "Sucessfully fake-opped Player " . TextFormat::YELLOW .  $player->getDisplayName());
			$player->sendMessage(TextFormat::GRAY . "You are now op!");
		}else{
			$sender->sendMessage("§cUsage: /opfake <Player>");
		}
                return true;
                case "deopfake":
                $name = \strtolower(\array_shift($args));

		$player = $sender->getServer()->getPlayer($name);

                if($player === $sender){
			$sender->sendMessage("You can't fake deop yourself!");
			return \true;
		}
		
                if($player instanceof Player){
			$sender->sendMessage(TextFormat::GREEN . "Sucessfully fake-deopped Player " . TextFormat::YELLOW .  $player->getDisplayName());
			$player->sendMessage(TextFormat::GRAY . "You are no longer op!");
		}else{
			$sender->sendMessage("§cUsage: /deopfake <Player>");
		}
                return true;
                case "setnick":
                 if (!($sender instanceof Player)){ 
                $sender->sendMessage(TextFormat::GREEN . "This command is only avaible In-Game!");
                    return true;
                }
                $sender->sendMessage(TextFormat::GREEN . "Nick set sucessfully.");
                $sender->setDisplayName(implode(" ", $args));
                          return true;
             
            case "sayas":
                $name = \strtolower(\array_shift($args));
                
            $sender->sendMessage(TextFormat::GREEN . "Sended Message as " .  $name);
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
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");
               $sender->getServer()->broadcastMessage(" ");$sender->getServer()->broadcastMessage(" ");
              
               $sender->getServer()->broadcastMessage(TextFormat::AQUA . "[ChatToolsPro] ".TextFormat::RED."Chat cleared.");
                       
            return true;
           case "spamsay":
               if(!(isset($args[0]))){
                    $sender->sendMessage(TextFormat::RED."Usage: /spamsay <Message>");
                    return true;
               }
               $sender->getServer()->broadcastMessage(implode(" ", $args));
               $sender->getServer()->broadcastMessage(implode(" ", $args));
               $sender->getServer()->broadcastMessage(implode(" ", $args));
               $sender->getServer()->broadcastMessage(implode(" ", $args));
               $sender->getServer()->broadcastMessage(implode(" ", $args));
               $sender->getServer()->broadcastMessage(implode(" ", $args));
               $sender->getServer()->broadcastMessage(implode(" ", $args));
               $sender->getServer()->broadcastMessage(implode(" ", $args));
               $sender->sendMessage(TextFormat::GREEN . "Message spammed sucessfully");
                       
           return true;
           case "spammsg":
                $name = \strtolower(\array_shift($args));

		$player = $sender->getServer()->getPlayer($name);

                if($player === $sender){
			$sender->sendMessage(TextFormat::Red . "You can't send a spammed Message to yourself!");
			return \true;
		}

		if($player instanceof Player){
			$player->sendMessage(TextFormat::YELLOW . "[" . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " -> ".$player->getName()."] " . implode(" ", $args));
                        $player->sendMessage(TextFormat::YELLOW . "[" . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " -> ".$player->getName()."] " . implode(" ", $args));
                        $player->sendMessage(TextFormat::YELLOW . "[" . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " -> ".$player->getName()."] " . implode(" ", $args));
                        $player->sendMessage(TextFormat::YELLOW . "[" . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " -> ".$player->getName()."] " . implode(" ", $args));
                        $player->sendMessage(TextFormat::YELLOW . "[" . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " -> ".$player->getName()."] " . implode(" ", $args));
                        $player->sendMessage(TextFormat::YELLOW . "[" . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " -> ".$player->getName()."] " . implode(" ", $args));
                        $player->sendMessage(TextFormat::YELLOW . "[" . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " -> ".$player->getName()."] " . implode(" ", $args));
                        $player->sendMessage(TextFormat::YELLOW . "[" . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " -> ".$player->getName()."] " . implode(" ", $args));
                        $player->sendMessage(TextFormat::YELLOW . "[" . ($sender instanceof Player ? $sender->getDisplayName() : $sender->getName()) . " -> ".$player->getName()."] " . implode(" ", $args));
                        $sender->sendMessage(TextFormat::GREEN . "Sucessfully spammed the Message to the Player " . TextFormat::YELLOW . $player->getName());
		}else{
			$sender->sendMessage(TextFormat::YELLOW . "Player not found!");
		}

		return true;
                case "helpme":
                 if (!($sender instanceof Player)){ 
                $sender->sendMessage(TextFormat::GREEN . "This command is only avaible In-Game!");
                    return true;
                }
                $sender->sendMessage(TextFormat::GREEN . "Type /done if you don't need help anymore.");
                $sender->setDisplayName(TextFormat::RED . "[NeedsHelp] ".$sender->getDisplayName());
                          return true;  
            case "done":
                 if (!($sender instanceof Player)){ 
                $sender->sendMessage(TextFormat::GREEN . "This command is only avaible In-Game!");
                    return true;
                }
                $sender->setDisplayName(str_replace(TextFormat::RED . "[NeedsHelp]", "", $sender->getDisplayName()));
                $sender->sendMessage(TextFormat::GREEN . "Type /helpme if you need help again.");
                return true;

            case "checkop":
             $name = \strtolower(\array_shift($args));

                    $player = $sender->getServer()->getPlayer($name);
		
                    if($player instanceof Player){
                if($player->isOp()){
		$sender->sendMessage(TextFormat::GREEN . "[ChatToolsPro] Player " . $player->getDisplayName() . " is an OP");

		return true;
                } else {
                    $sender->sendMessage(TextFormat::GREEN . "[ChatToolsPro] Player " . $player->getDisplayName() . " is not OP");
                    return true;
                }
                    } else {
                        $sender->sendMessage(TextFormat::RED . "Player not online!");
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
					}
				}
			}else{
				$sender->sendMessage(TextFormat::RED."No Permission!");
				return true;
			}
               case "lockchat":
               	        if(!(isset($args[0]))){
                $sender->sendMessage(TextFormat::GREEN . "Please specify the action! /lockchat <lock/unlock>
                    return true;
                }
            if($args[0] == "lock"){
            $sender->sendMessage($this->prefix."Chat got locked!");
            $sender->getServer()->broadcastMessage($this->prefix."Chat got locked by ".$sender->getName())
	   $this->disableChat = true;
                return true;
            }
            elseif($args[0] == "unlock"){
           $sender->sendMessage($this->prefix."Chat got unlocked!");
           $sender->getServer()->broadcastMessage($this->prefix."Chat got unlocked by ".$sender->getName())
           $this->disableChat = false;
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
     *                         Coded by paetti
     */
             
