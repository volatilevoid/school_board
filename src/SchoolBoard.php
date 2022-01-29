<?php

namespace App;

use App\Interface\CalcFinalResultInterface;
use App\Interface\FormatOutputInterface;

class SchoolBoard
{
    private CalcFinalResultInterface $gradeCalculator;
    private Student $student;
    private FormatOutputInterface $outputFormatter;

    public function __construct(CalcFinalResultInterface $c, Student $s, FormatOutputInterface $f)
    {
        $this->gradeCalculator = $c;
        $this->student = $s;
        $this->outputFormatter = $f;
    }

    public function getResults()
    {
        return $this->outputFormatter->getFormated([
            'id' => $this->student->getID(),
            'name' => $this->student->getName(),
            'grades' => $this->student->getAllGrades(),
            'average_result' => $this->student->getAverageGrade(),
            'final_result' => $this->student->getFinalGrade($this->gradeCalculator)
        ]);
    }
}