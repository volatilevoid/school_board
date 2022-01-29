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
    private string $board;
    private array $grades = [];

    public function __construct(int $id, string $name, string $board)
    {
        $this->id = $id;
        $this->name = $name;
        $this->board = $board;
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

    public function getBoard(): string
    {
        return $this->board;
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

    public function getFinalGrade(CalcFinalResultInterface $calculator): string
    {
        if (count($this->grades) === 0) {
            throw new Exception('No grades entered');
        }

        return $calculator->isPassed($this->grades) ? 'Pass' : 'Fail'; 
    }
}