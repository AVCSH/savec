<?php declare(strict_types = 1);

namespace App\Entity\Equipment\Exception;


use App\Entity\Equipment\EquipmentId;

class EquipmentNotFound extends \InvalidArgumentException
{
	public static function withEquipmentId(EquipmentId $equipmentId): self {
		return new self(sprintf('Equipment with id %s cannot be found', (string) $equipmentId));
	}
}
