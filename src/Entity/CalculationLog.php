<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CalculationLog
 *
 * @ORM\Table(name="calculation_log")
 * @ORM\Entity(repositoryClass="App\Repository\CalculationLogRepository")
 */
class CalculationLog
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\Column(name="calc_input", type="string", length=255, nullable=false)
     */
    private string $calcInput;

    /**
     * @ORM\Column(name="calc_output", type="string", length=255, nullable=false)
     */
    private string $calcOutput;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCalcInput(): ?string
    {
        return $this->calcInput;
    }

    public function setCalcInput(string $calcInput): self
    {
        $this->calcInput = $calcInput;

        return $this;
    }

    public function getCalcOutput(): ?string
    {
        return $this->calcOutput;
    }

    public function setCalcOutput(string $calcOutput): self
    {
        $this->calcOutput = $calcOutput;

        return $this;
    }

    public function __toString(): string
    {
        return (string)$this->id;
    }
}
