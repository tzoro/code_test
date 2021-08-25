<?php

namespace App\Entity;

use App\Repository\RepofetchRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RepofetchRepository::class)
 */
class Repofetch
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $u_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $u_repo;

    /**
     * @ORM\Column(type="float")
     */
    private $t_score;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUName(): ?string
    {
        return $this->u_name;
    }

    public function setUName(string $u_name): self
    {
        $this->u_name = $u_name;

        return $this;
    }

    public function getURepo(): ?string
    {
        return $this->u_repo;
    }

    public function setURepo(string $u_repo): self
    {
        $this->u_repo = $u_repo;

        return $this;
    }

    public function getTScore(): ?float
    {
        return $this->t_score;
    }

    public function setTScore(float $t_score): self
    {
        $this->t_score = $t_score;

        return $this;
    }
}
