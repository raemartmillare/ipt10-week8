<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class HTMLFormat implements ProfileFormatter
{
    private string $response = '';

    private const DEFAULT_IMAGE_URL = 'https://www.auf.edu.ph/home/images/articles/bya.jpg';

    public function setData($profile): void
    {
        // CSS for a modern website layout
        $styles = "
            <style>
                body {
                    margin: 0;
                    padding: 0;
                    font-family: 'Helvetica Neue', Arial, sans-serif;
                    background-color: #f4f7f6;
                    color: #333;
                }
                .container {
                    max-width: 1000px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #fff;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                }
                h1 {
                    color: #2c3e50;
                    font-size: 3em;
                    text-align: center;
                    margin-bottom: 20px;
                    font-weight: bold;
                }
                img {
                    width: 200px;
                    height: 200px;
                    border-radius: 50%;
                    display: block;
                    margin: 0 auto 20px auto;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                }
                p {
                    font-size: 1.2em;
                    line-height: 1.6;
                    margin: 10px 0;
                    color: #555;
                }
                .section-title {
                    font-size: 1.5em;
                    color: #2980b9;
                    margin-top: 30px;
                    border-bottom: 2px solid #2980b9;
                    padding-bottom: 5px;
                }
                .profile-info {
                    margin-top: 20px;
                    background-color: #f9f9f9;
                    padding: 15px;
                    border-radius: 8px;
                    box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.1);
                }
                .bio {
                    font-style: italic;
                    background-color: #e0f7fa;
                    padding: 10px;
                    border-left: 5px solid #00acc1;
                    border-radius: 5px;
                }
                footer {
                    margin-top: 40px;
                    text-align: center;
                    padding: 20px;
                    background-color: #2c3e50;
                    color: white;
                    border-radius: 0 0 8px 8px;
                }
                footer p {
                    margin: 0;
                    font-size: 0.9em;
                }
            </style>
        ";

        // Build HTML content with added structure and classes
        $output = $styles;  // Include the CSS at the beginning of the output
        $output .= "<div class='container'>";

        $output .= "<h1>The Founder: " . $profile->getFullName() . "</h1>";

        $imagePath = $profile->getImageUrl() ?: self::DEFAULT_IMAGE_URL;
        $output .= "<img src='" . $imagePath . "' alt='Profile Image'>";

        // Biography Section
        $output .= "<div class='bio'><p>" . $profile->getBirthLife() . "</p></div>";

        // Profile Info Section
        $output .= "<div class='profile-info'>";
        $education = $profile->getEducation();
        $output .= "<p><strong>Education:</strong> " . (is_array($education) ? implode(", ", $education) : $education) . "</p>";
        $output .= "</div>";

        // School Vision Section
        $output .= "<div class='section-title'>School Vision</div>";
        $output .= "<p>" . $profile->getSchoolVision() . "</p>";

        // School Building Section
        $output .= "<div class='section-title'>School Building</div>";
        $output .= "<p>" . $profile->getSchoolBuilding() . "</p>";

        // Staff and Operations Section
        $output .= "<div class='section-title'>Staff and Operations</div>";
        $output .= "<p>" . $profile->getStaffAndOperations() . "</p>";

        // Reestablishment Section
        $output .= "<div class='section-title'>Reestablishment</div>";
        $output .= "<p>" . $profile->getReestablishment() . "</p>";

        // Footer Section
        $output .= "<footer><p>&copy; 2024 NexGen Hardware. All Rights Reserved.</p></footer>";

        $output .= "</div>";  // Close container

        $this->response = $output;
    }

    public function render(): string
    {
        return $this->response;
    }
}
