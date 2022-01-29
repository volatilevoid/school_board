<?php

namespace App;

use App\Interface\CalcFinalResultInterface;
use App\Traits\CalcAverageTrait;
use Exception;

class Student
{
    use CalcAverageTrait;

    private int $id;
    private string $name;
    private array $grades = [];

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function addGrade(int $grade)
    {
        if (count($this->grades) === 4) {
            throw new Exception('Max number of grades reached');
        }

        $this->grades[] = $grade;
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAllGrades(): array
    {
        return $this->grades;
    }

    public function getAverageGrade(): float
    {
        if (count($this->grades) === 0) {
            throw new Exception('No grades entered');
        }

        return $this->calculateAverage($this->grades);
    }

    public function getFinalGrade(CalcFinalResultInterface $calculator)
    {
        if (count($this->grades) === 0) {
            throw new Exception('No grades entered');
        }

        return $calculator->isPassed($this->grades) ? 'Pass' : 'Fail'; 
    }
}