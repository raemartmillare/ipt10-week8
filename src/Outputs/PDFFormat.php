<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;
use Fpdf\Fpdf;

class PDFFormat implements ProfileFormatter
{
    private $pdf;

    public function setData($profile)
    {
        $this->pdf = new Fpdf();
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial', 'B', 16);

        $this->pdf->Cell(0, 10, 'The Founder ' . $profile->getFullName(), 0, 1, 'C');

        $imagePath = $profile->getImageUrl() ?: 'default_image.jpg';
        $this->pdf->Image($imagePath, 60, 25, 90, 0, 'JPG'); // Image at (60, 50)
        
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->SetY(150); 
        $this->pdf->MultiCell(0, 5, $profile->getBirthLife() ?? 'No information available');
        $this->pdf->Ln();
        
        $education = $profile->getEducation();
        $this->pdf->MultiCell(0, 5,  (is_array($education) ? implode(", ", $education) : $education));
        $this->pdf->Ln();

        $this->pdf->MultiCell(0, 5, $profile->getSchoolVision());
        $this->pdf->Ln();

        $this->pdf->MultiCell(0, 5, $profile->getSchoolBuilding());
        $this->pdf->Ln();

        $this->pdf->MultiCell(0, 5, $profile->getStaffAndOperations());
        $this->pdf->Ln();

        $this->pdf->MultiCell(0, 5, $profile->getReestablishment());
        $this->pdf->Ln();


        //$this->pdf->Cell(0, 10, '' . $profile->getBirthLife());

        


    }

    public function render()
    {
        // Output PDF to string (to save to file)
        return $this->pdf->Output();
    }
}