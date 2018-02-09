<?php declare(strict_types=1);


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity
 */
class ItemType
{
    /**
     * @var UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $commonName;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=1023, nullable=true)
     */
    protected $officialName;

    /**
     * @var int|null
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $basicRentalPrice;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    protected $productPageUrl;

    /**
     * @var string|null
     * @TODO How to handle files
     * @ORM\Column(type="string", nullable=true)
     */
    protected $avatar;

    /**
     * @var string[]
     * @TODO How to handle files
     * @ORM\Column(type="json_array", nullable=true)
     */
    protected $attachments;

    /**
     * Weight in grams.
     *
     * @var int|null
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $weight;

    /**
     * ItemType constructor.
     *
     * @param string $commonName
     */
    public function __construct(string $commonName)
    {
        $this->commonName = $commonName;
        $this->id = Uuid::uuid4();
    }

    /**
     * @return string
     */
    public function getCommonName(): string
    {
        return $this->commonName;
    }

    /**
     * @param string $commonName
     */
    public function setCommonName(string $commonName): void
    {
        $this->commonName = $commonName;
    }

    /**
     * @return null|string
     */
    public function getOfficialName(): ?string
    {
        return $this->officialName;
    }

    /**
     * @param null|string $officialName
     */
    public function setOfficialName(?string $officialName): void
    {
        $this->officialName = $officialName;
    }

    /**
     * @return int|null
     */
    public function getBasicRentalPrice(): ?int
    {
        return $this->basicRentalPrice;
    }

    /**
     * @param int|null $basicRentalPrice
     */
    public function setBasicRentalPrice(?int $basicRentalPrice): void
    {
        $this->basicRentalPrice = $basicRentalPrice;
    }

    /**
     * @return null|string
     */
    public function getProductPageUrl(): ?string
    {
        return $this->productPageUrl;
    }

    /**
     * @param null|string $productPageUrl
     */
    public function setProductPageUrl(?string $productPageUrl): void
    {
        $this->productPageUrl = $productPageUrl;
    }

    /**
     * @return null|string
     */
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    /**
     * @param null|string $avatar
     */
    public function setAvatar(?string $avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * @return string[]
     */
    public function getAttachments(): array
    {
        return $this->attachments;
    }

    /**
     * @param string[] $attachments
     */
    public function setAttachments(array $attachments): void
    {
        $this->attachments = $attachments;
    }

    /**
     * @return int|null
     */
    public function getWeight(): ?int
    {
        return $this->weight;
    }

    /**
     * @param int|null $weight
     */
    public function setWeight(?int $weight): void
    {
        $this->weight = $weight;
    }

}
