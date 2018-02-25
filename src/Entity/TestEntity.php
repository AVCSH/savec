<?php declare(strict_types = 1);

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity
 */
class TestEntity
{
	/**
	 * @var UuidInterface
	 *
	 * @ORM\Id
	 * @ORM\Column(type="guid", unique=true)
	 */
	protected $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="text")
	 */
	protected $data;

	public function __construct() {
		$this->id = Uuid::uuid4();
		$this->data = '';
	}

	public function getId(): UuidInterface {
		return $this->id;
	}

	public function getData(): string {
		return $this->data;
	}

	public function setData(string $data): void {
		$this->data = $data;
	}
}
