<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class HTMLFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        $output = "<h1>Profile of " . $profile->getFullName() . "</h1>";
        $output .= "<p>Email: " . $profile->getContactDetails()['email'] . "</p>";
        $output .= "<p>Phone: " . $profile->getContactDetails()['phone_number'] . "</p>";
        $output .= "<h2>Education</h2>";
        $output .= "<p>" . $profile->getEducation()['degree'] . " at " . $profile->getEducation()['university'] . "</p>";
        $output .= "<h2>Skills</h2>";
        $output .= "<p>" . implode(", ", $profile->getSkills()) . "</p>";
        $output .= "<h2>Experience</h2><ul>";

        foreach ($profile->getExperience() as $job) {
            $output .= "<li>" . $job['job_title'] . " at " . $job['company'] . " (" . $job['start_date'] . " to " . $job['end_date'] . ")</li>";
        }

        $output .= "</ul>";

        // Adding Certifications
        $output .= "<h2>Certifications</h2>";
        $certifications = $profile->getCertifications();
        $output .= "<ul>";
        foreach ($certifications as $certification) {
            $output .= "<li>" . $certification['name'] . " (Earned on: " . $certification['date_earned'] . ")</li>";
        }
        $output .= "</ul>";

        // Adding Extra-Curricular Activities
        $output .= "<h2>Extra-Curricular Activities</h2>";
        $activities = $profile->getExtraCurricularActivities();
        $output .= "<ul>";
        foreach ($activities as $activity) {
            $output .= "<li>" . $activity['role'] . " at " . $activity['organization'] . " (" . $activity['start_date'] . " to " . $activity['end_date'] . ") - " . $activity['description'] . "</li>";
        }
        $output .= "</ul>";

        // Adding Languages
        $output .= "<h2>Languages</h2>";
        $languages = $profile->getLanguages();
        $output .= "<ul>";
        foreach ($languages as $language) {
            $output .= "<li>" . $language['language'] . " (" . $language['proficiency'] . ")</li>";
        }
        $output .= "</ul>";

        // Adding References
        $output .= "<h2>References</h2>";
        $references = $profile->getReferences();
        $output .= "<ul>";
        foreach ($references as $reference) {
            $output .= "<li>" . $reference['name'] . " (" . $reference['position'] . ", " . $reference['company'] . ") - Email: " . $reference['email'] . ", Phone: " . $reference['phone_number'] . "</li>";
        }
        $output .= "</ul>";

        $this->response = $output;

    }

    public function render()
    {
        return $this->response;
    }
}
