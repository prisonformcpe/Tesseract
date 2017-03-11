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

	public $unknown;
	public $unknown1;
	public $unknown2;
	public $unknown3;

	public function decode(){
		$this->unknown = $this->getVarInt(); //Type ?
		$this->unknown1 = $this->getString(); //Message
		$this->unknown2 = $this->getVarInt();
		$this->unknown3 = $this->getVarInt();
	}

	public function encode(){
		$this->reset();
		$this->putVarInt($this->unknown); //Type ?
		$this->putString($this->unknown1); //Message
		$this->putVarInt($this->unknown2);
		$this->putVarInt($this->unknown3);
	}

	/**
	 * @return PacketName|string
     */
	public function getName(){
		return "SetTitlePacket";
	}

}
