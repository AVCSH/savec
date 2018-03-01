<?php declare(strict_types = 1);

namespace App\Entity\Equipment;


use App\Entity\Entity;
use App\Entity\Equipment\Event\EquipmentRegistered;
use App\Entity\Equipment\Event\NameChanged;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;

class Equipment extends AggregateRoot implements Entity
{
	/**
	 * @var EquipmentId
	 */
	private $id;

	/**
	 * @var string
	 */
	private $name;


	protected function aggregateId(): string {
		return (string) $this->id;
	}

	public function changeName(string $name): void {
		if ($this->name === $name) {
			return;
		}

		$this->recordThat(
			NameChanged::withData($this->id, $name)
		);
	}

	static public function registerToSystem(EquipmentId $id, string $name): self {
		$result = new self();
		$result->recordThat(
			NameChanged::withData($id, $name)
		);
		return $result;
	}

	public function id(): EquipmentId {
		return $this->id;
	}

	public function name(): string {
		return $this->name;
	}



	/**
	 * Apply given event
	 */
	protected function apply(AggregateChanged $event): void {
		if ($event instanceof NameChanged ||
			$event instanceof EquipmentRegistered
		) {
			$this->id = $event->id();
			$this->name = $event->name();
			return;
		}
	}
}
