<?php declare(strict_types = 1);

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity
 */
class SubEvent
{
	/**
	 * @var UuidInterface
	 *
	 * @ORM\Id
	 * @ORM\Column(type="Uuid", unique=true)
	 */
	protected $id;

	/**
	 * @var Event
	 *
	 * @ORM\ManyToOne(targetEntity="Event")
	 */
	protected $parent;

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
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetimetz")
	 */
	protected $startDate;

	public function __construct() {
		$this->id = Uuid::uuid4();
	}

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetimetz")
	 */
	protected $endDate;

	public function __construct(Event $parent, string $title, string $description, \DateTime $startDate, \DateTime $endDate) {
		$this->id = Uuid::uuid4();
		$this->parent = $parent;
		$this->title = $title;
		$this->description = $description;
		$this->startDate = $startDate;
		$this->endDate = $endDate;
	}

	public function getId(): UuidInterface {
		return $this->id;
	}

	public function getParent(): Event {
		return $this->parent;
	}

	public function setParent(Event $parent): void {
		$this->parent = $parent;
	}

	public function getTitle(): string {
		return $this->title;
	}

	public function setTitle(string $title): void {
		$this->title = $title;
	}

	public function getDescription(): string {
		return $this->description;
	}

	public function setDescription(string $description): void {
		$this->description = $description;
	}

	public function getStartDate(): \DateTime {
		return $this->startDate;
	}

	public function setStartDate(\DateTime $startDate): void {
		$this->startDate = $startDate;
	}

	public function getEndDate(): \DateTime {
		return $this->endDate;
	}

	public function setEndDate(\DateTime $endDate): void {
		$this->endDate = $endDate;
	}
}
