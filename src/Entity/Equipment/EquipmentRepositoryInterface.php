<?php declare(strict_types = 1);

namespace App\Entity\Equipment;


interface EquipmentRepositoryInterface
{
	public function get(EquipmentId $equipmentId): Equipment;

	public function find(EquipmentId $equipmentId): ?Equipment;

	public function save(Equipment $equipment): void;
}
