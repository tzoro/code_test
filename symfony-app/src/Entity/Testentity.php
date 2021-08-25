<?php

namespace App\Entity;

use App\Repository\TestentityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestentityRepository::class)
 */
class Testentity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tfield;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $term;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTfield(): ?string
    {
        return $this->tfield;
    }

    public function setTfield(?string $tfield): self
    {
        $this->tfield = $tfield;

        return $this;
    }

    public function getTerm(): ?string
    {
        return $this->term;
    }

    public function setTerm(?string $term): self
    {
        $this->term = $term;

        return $this;
    }
}
