<?php declare(strict_types = 1);

namespace App\Repository;


use App\Entity\Equipment\Equipment;
use App\Entity\Equipment\EquipmentId;
use App\Entity\Equipment\EquipmentRepositoryInterface;
use App\Entity\Equipment\Exception\EquipmentNotFound;
use Prooph\EventSourcing\Aggregate\AggregateRepository;

class EquipmentRepository extends AggregateRepository implements EquipmentRepositoryInterface
{
	public function get(EquipmentId $equipmentId): Equipment {
		$equipment = $this->find($equipmentId);

		if($equipment === null){
			throw new EquipmentNotFound($equipmentId);
		}

		return $equipment;
	}

	public function find(EquipmentId $equipmentId): ?Equipment {
		$result = $this->getAggregateRoot((string) $equipmentId);

		\assert($result === null || $result instanceof Equipment);

		return $result;

	}

	public function save(Equipment $equipment): void {
		$this->saveAggregateRoot($equipment);
	}
}
