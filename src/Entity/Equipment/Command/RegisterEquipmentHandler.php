<?php declare(strict_types = 1);

namespace App\Entity\Equipment\Command;


use App\Entity\Equipment\Equipment;
use App\Entity\Equipment\EquipmentRepositoryInterface;

class RegisterEquipmentHandler
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

	public function __invoke(RegisterEquipment $equipmentCommand): void {
		$equipment = Equipment::registerToSystem($equipmentCommand->equipmentId(), $equipmentCommand->name());
		$this->equipmentRepository->save($equipment);
	}
}
