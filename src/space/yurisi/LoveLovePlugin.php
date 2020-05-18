<?php


namespace space\yurisi;


use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use space\yurisi\Commands\LoveCommand;

class LoveLovePlugin extends PluginBase{

	private static $main;

	public function onEnable() {
		self::$main=$this;
		Server::getInstance()->getCommandMap()->register("lovelovelovelovelovelove",new LoveCommand());
	}

	public static function getInstance():LoveLovePlugin{
		return self::$main;
	}

}