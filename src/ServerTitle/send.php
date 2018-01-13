<?php
namespace ServerTitle;

use pocketmine\scheduler\PluginTask;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class send extends PluginTask{

	public function __construct(PluginBase $owner,Player $player){
		parent::__construct($owner);
		$this->player = $player;
	}

	public function onRun(int $currentTick){
		$this->Config = $this->owner->Config;
		$title = $this->Config->get("serverName");
		$subtitle = $this->Config->get("serverVersion");
		if($title == ""){
			$this->Config->set("serverName", "§l§bMinecraft:PE Server");
			$this->Config->save();
		}
		if($subtitle == ""){
			$this->Config->set("serverVersion", "MCPE for x.x.x");
			$this->Config->save();
		}
		$title = $this->Config->get("serverName");
		$subtitle = $this->Config->get("serverVersion");
		$this->player->addTitle($title, $subtitle, "20", "20", "20");
	}
}
