<?php declare(strict_types=1);

namespace App\Command;


use App\Entity\Equipment\Command\RegisterEquipment;
use Prooph\Bundle\ServiceBus\CommandBus;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RegisterEquipmentCommand extends ContainerAwareCommand
{
	/**
	 * @var CommandBus
	 */
	private $commandBus;

	public function __construct(CommandBus $commandBus)
	{
		parent::__construct(null);
		$this->commandBus = $commandBus;
	}

	protected function configure(): void
	{
		$this->setName('app:register-equipment')
			->addArgument('name', InputArgument::REQUIRED);
	}

	protected function execute(InputInterface $input, OutputInterface $output): void
	{
		$id = Uuid::uuid4()->toString();

		$command = new RegisterEquipment($id, $input->getArgument('name'));
		$this->commandBus->dispatch($command);

		$io = new SymfonyStyle($input, $output);

		$io->success('Probably created with id ' . $id);

	}
}
