<?php declare(strict_types = 1);

namespace App\Entity\Equipment;


use App\Entity\ValueObject;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class EquipmentId implements ValueObject
{
	/**
	 * @var UuidInterface
	 */
	private $uuid;

	public static function generate(): self {
		return new self(Uuid::uuid4());
	}

	public static function fromString(string $id): self {
		return new self(Uuid::fromString($id));
	}

	private function __construct(UuidInterface $uuid) {
		$this->uuid = $uuid;
	}

	public function __toString(): string {
		return $this->uuid->toString();
	}


	public function compare(ValueObject $rhs): int {
		return $rhs instanceof self ?
			$this->uuid->compareTo($rhs->uuid) :
			get_class($this) <=> get_class($rhs);
	}
}
