<?php declare(strict_types=1);

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
}
