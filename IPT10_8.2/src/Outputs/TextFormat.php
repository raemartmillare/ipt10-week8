<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class TextFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        $output = "Founder: " . $profile->getFullName() . PHP_EOL . PHP_EOL;
        $output .= "" . $profile->getBirthLife() . PHP_EOL . PHP_EOL;
        $education = $profile->getEducation();
        $output .= "Education: " . (is_array($education) ? implode(", ", $education) : $education) . PHP_EOL . PHP_EOL;
        $output .= "" . $profile->getSchoolVision() . PHP_EOL . PHP_EOL;
        $output .= "" . $profile->getSchoolBuilding() . PHP_EOL . PHP_EOL;
        $output .= "" . $profile-> getStaffAndOperations() . PHP_EOL . PHP_EOL;
        $output .= "" . $profile-> getReestablishment() . PHP_EOL . PHP_EOL;
        
        
        $this->response = $output;
        
    }

    public function render()
    {
        header('Content-Type: text');
        return $this->response;
    }
}
