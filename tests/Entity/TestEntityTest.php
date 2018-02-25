<?php declare(strict_types = 1);

namespace App\Tests\Entity;


use App\Entity\TestEntity;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class TestEntityTest extends KernelTestCase
{
	/**
	 * @var ObjectManager
	 */
	private $entityManager;

	/**
	 * @var ObjectRepository
	 */
	protected $repository;

	/**
	 * {@inheritDoc}
	 */
	protected function setUp() {
		$kernel = self::bootKernel();

		$doctrine = $kernel->getContainer()->get('doctrine');

		assert($doctrine instanceof ManagerRegistry);

		$this->entityManager = $doctrine->getManager();

		$this->repository = $doctrine->getRepository(TestEntity::class);
	}

	public function testGetData(): void {
		$data = 'test';

		$entity = new TestEntity();

		$id = $entity->getId();

		$this->assertEmpty($entity->getData());

		$entity->setData($data);

		$this->assertEquals($data, $entity->getData());

		$this->entityManager->persist($entity);
		$this->entityManager->flush();
		unset($entity);
		$this->entityManager->clear();


		$entity = $this->repository->find($id);
		assert($entity instanceof TestEntity);

		$this->assertEquals($data, $entity->getData());

	}
}
