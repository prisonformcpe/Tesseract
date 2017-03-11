<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____  
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \ 
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/ 
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_| 
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 * 
 *
*/

namespace pocketmine\network\protocol;

#include <rules/DataPacket.h>


class SetTitlePacket extends DataPacket{

	const NETWORK_ID = Info::SET_TITLE_PACKET;

	//TODO: Find out exactly what is 0 and 1.
	//const CLEAR = 0;
	//const RESET = 1;
	const SEND_TITLE = 2;
	const SEND_SUB_TITLE = 3;
	const SEND_ACTION_BAR = 4;

	public $type;
	public $message;
	public $unknown;
	public $unknown1;

	public function decode(){
		$this->type = $this->getVarInt();
		$this->message = $this->getString();
		$this->unknown = $this->getVarInt();
		$this->unknown1 = $this->getVarInt();
	}

	public function encode(){
		$this->reset();
		$this->putVarInt($this->type);
		$this->putString($this->message);
		$this->putVarInt($this->unknown);
		$this->putVarInt($this->unknown1);
	}

	/**
	 * @return PacketName|string
     */
	public function getName(){
		return "SetTitlePacket";
	}

}
