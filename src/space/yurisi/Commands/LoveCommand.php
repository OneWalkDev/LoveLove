<?php


namespace space\yurisi\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\level\Level;
use pocketmine\level\particle\HeartParticle;
use pocketmine\math\Vector3;
use pocketmine\Player;
use space\yurisi\LoveLovePlugin;
use space\yurisi\Task\HeartTask;

class LoveCommand extends Command {

	public function __construct() {
		parent::__construct("love","愛を振りまきましょう","/love");
	}

	/**
	 * @param CommandSender $sender
	 * @param string $commandLabel
	 * @param string[] $args
	 *
	 * @return mixed
	 */
	public function execute(CommandSender $sender, string $commandLabel, array $args) {
		if ($sender instanceof Player) {
			$func = function (int $x, int $y, int $z, Level $level, int $direction) {
				for ($i = 0; $i < 360; $i += 10) {
					yield;
					if($direction===0 or $direction===2) {
						$level->addParticle(new HeartParticle(new Vector3($x,$y+2+(1*cos(deg2rad($i))-cos(deg2rad($i))**4)*2,$z+sin(deg2rad($i))**3*2*1)));

					}else {
						$level->addParticle(new HeartParticle(new Vector3($x+sin(deg2rad($i))**3*2*1,$y+2+(1*cos(deg2rad($i))-cos(deg2rad($i))**4)*2,$z)));
					}
				}
			};
			LoveLovePlugin::getInstance()->getScheduler()->scheduleRepeatingTask(new HeartTask($func($sender->getX(), $sender->getY(), $sender->getZ(), $sender->getLevel(),$sender->getDirection())), 1);
		}
		return true;
	}
}

