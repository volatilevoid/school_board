<?php

namespace App;

class SchoolApp
{
    public static function run()
    {

        try {
            $studentID = Input::get();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        // TODO DB
        $mockStudent = new Student(1, 'name');
        $mockStudent->addGrade(6);
        $mockStudent->addGrade(9);
        $mockStudent->addGrade(5);

        $schoolBoardCSM = new SchoolBoard(
            new FinalResultCalculatorCSM(),
            $mockStudent,
            new OutputJSON()
        );

        $schoolBoardCSMB = new SchoolBoard(
            new FinalResultCalculatorCSMB(),
            $mockStudent,
            new OutputXML
        );

        $csmReport = $schoolBoardCSM->getResults();
        
        $csmbReport = $schoolBoardCSMB->getResults();
    }
}