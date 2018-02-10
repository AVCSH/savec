<?php declare(strict_types=1);

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
	 * @ORM\Column(type="string", nullable=true)
	 */
	protected $comment;

	/**
	 * @param string $name
	 * */
	public function __construct(string $name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name): void {
		$this->name = $name;
	}

	/**
	 * @return null|string
	 */
	public function getComment(): ?string {
		return $this->comment;
	}

	/**
	 * @param null|string $comment
	 */
	public function setComment(?string $comment): void {
		$this->comment = $comment;
	}
}
