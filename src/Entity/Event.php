<?php declare(strict_types=1);

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
	 * @ORM\Column(type="string")
	 */
	protected $description;

	/**
	 * @var EventType
	 * @ORM\ManyToOne(targetEntity="EventType")
	 */
	protected $eventType;


	/** 
	 * ItemType constructor
	 *
	 */
	public function __construct() {
		$this->id = Uuid::uuid4();
	}

	/**
	 * @return string
	 */
	public function getTitle(): string {
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title): void {
		$this->title = $title;
	}

	/**
	 * @return EventType
	 */
	public function getEventType(): EventType {
		return $this->eventType;
	}

	/**
	 * @param EventType $eventType
	 */
	public function setEventType(EventType $eventType): void {
		$this->eventType = $eventType;
	}
}
