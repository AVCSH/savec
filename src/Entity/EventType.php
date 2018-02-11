<?php declare(strict_types = 1);

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class EventType
{
	/**
	 * @var int
	 *
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	protected $id;

	/**
	 * @var string
	 * @ORM\Column(type="string", length=64, unique=true)
	 */
	protected $name;

	/**
	 * @var string|null
	 * @ORM\Column(type="string", nullable=true, length=512)
	 */
	protected $comment;

	public function __construct(string $name, ?string $comment = null) {
		$this->name = $name;
		$this->comment = $comment;
	}

	public function getId(): int {
		return $this->id;
	}

	public function getName(): string {
		return $this->name;
	}

	public function setName(string $name): void {
		$this->name = $name;
	}

	public function getComment(): ?string {
		return $this->comment;
	}

	public function setComment(?string $comment): void {
		$this->comment = $comment;
	}
}
