<?php declare(strict_types = 1);

namespace App\Entity\Equipment\Command;


use App\Entity\Equipment\EquipmentId;
use Prooph\Common\Messaging\Command;

class ChangeEquipmentName extends Command
{
	/**
	 * @var EquipmentId
	 */
	private $equipmentId;

	/**
	 * @var string
	 */
	private $name;

	public function __construct(
		EquipmentId $equipmentId,
		string $name
	) {
		$this->equipmentId = $equipmentId;
		$this->name = $name;
		$this->init();
	}

	/**
	 * @return mixed[]
	 */
	public function payload(): array {
		return [
			'id' => (string) $this->equipmentId,
			'name' => $this->name,
		];
	}

	/**
	 * @param mixed[] $payload
	 */
	protected function setPayload(array $payload): void {
		if (isset($payload['id']))
			$this->equipmentId = EquipmentId::fromString($payload['id']);
		$this->name = $payload['name'] ?? $this->name;
	}

	public function equipmentId(): EquipmentId {
		return $this->equipmentId;
	}

	public function name(): string {
		return $this->name;
	}
}
