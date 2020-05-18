<?php


namespace space\yurisi\Task;


use pocketmine\scheduler\Task;

class HeartTask extends Task {

	/**
	 * @var \Generator
	 */
	private $generator;

	/**
	 * Actions to execute when run
	 *
	 * @param \Generator $generator
	 */
	public function __construct(\Generator $generator) {
		$this->generator = $generator;
	}

	/**
	 * @param int $currentTick
	 */
	public function onRun(int $currentTick) {
		if ($this->generator->valid()) {
			$this->generator->next();
		} else {
			$this->getHandler()->cancel();
		}
	}
}