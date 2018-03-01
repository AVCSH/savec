<?php declare(strict_types = 1);

namespace App\Entity\Equipment\Command;


use App\Entity\Equipment\EquipmentRepositoryInterface;

class ChangeEquipmentNameHandler
{
	/**
	 * @var EquipmentRepositoryInterface
	 */
	private $equipmentRepository;

	public function __construct(
		EquipmentRepositoryInterface $equipmentRepository
	) {
		$this->equipmentRepository = $equipmentRepository;
	}

	public function __invoke(ChangeEquipmentName $equipmentCommand): void {
		$equipment = $this->equipmentRepository->get($equipmentCommand->equipmentId());
		$equipment->changeName($equipmentCommand->name());
		$this->equipmentRepository->save($equipment);
	}
}
