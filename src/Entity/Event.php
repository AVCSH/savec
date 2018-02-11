<?php declare(strict_types = 1);

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity
 */
class Event
{
	/**
	 * @var UuidInterface
	 *
	 * @ORM\Id
	 * @ORM\Column(type="Uuid", unique=true)
	 */
	protected $id;


	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=256)
	 */
	protected $title;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="text")
	 */
	protected $description;

	/**
	 * @var EventType
	 * @ORM\ManyToOne(targetEntity="EventType")
	 */
	protected $eventType;

	public function __construct(string $title, EventType $eventType) {
		$this->id = Uuid::uuid4();
		$this->title = $title;
		$this->eventType = $eventType;
	}

	public function getId(): UuidInterface {
		return $this->id;
	}

	public function getTitle(): string {
		return $this->title;
	}

	public function setTitle(string $title): void {
		$this->title = $title;
	}

	public function getEventType(): EventType {
		return $this->eventType;
	}

	public function setEventType(EventType $eventType): void {
		$this->eventType = $eventType;
	}
}
