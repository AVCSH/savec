<?php declare(strict_types = 1);

namespace App\Entity\Equipment\Event;


use App\Entity\Equipment\EquipmentId;
use Prooph\EventSourcing\AggregateChanged;

class NameChanged extends AggregateChanged
{
	/**
	 * @var EquipmentId
	 */
	private $id;

	/**
	 * @var string
	 */
	private $name;

	public static function withData(EquipmentId $id, string $name): self {
		$event = parent::occur(
			(string) $id,
			['name' => $name]
		);

		\assert($event instanceof self);

		$event->name = $name;

		return $event;
	}

	public function id(): EquipmentId {
		return $this->id;
	}

	public function name(): string {
		return $this->name;
	}
}
