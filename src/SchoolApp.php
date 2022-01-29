<?php

namespace App;

use Exception;

class SchoolApp
{
    public static function run()
    {

        try {
            $schoolBoard = null;
            $studentID = Input::get();

            $db = new Database();
            $s = $db->getStudent($studentID);

            $student = new Student($s['id'], $s['name'], $s['board']);
            $grades = explode(',', $s['grades']);

            if(!empty($grades)) {
                foreach ($grades as $grade) {
                    $student->addGrade($grade);
                }
            }

            if (strtolower($student->getBoard()) === 'csm') {
                $schoolBoard = new SchoolBoard(
                    new FinalResultCalculatorCSM(),
                    $student,
                    new OutputJSON()
                );
            }

            if (strtolower($student->getBoard()) === 'csmb') {
                $schoolBoard = new SchoolBoard(
                    new FinalResultCalculatorCSMB(),
                    $student,
                    new OutputXML()
                );
            }
       
            if (!is_null($schoolBoard)) {
                return $schoolBoard->getResults();
            } else {
                throw new Exception('Unknown board');
            }
        
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

 

    }
}