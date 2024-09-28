<?php

namespace App;

class Profile
{
    private $names;
    private $birth_life;
    private $education;
    private $school_vision;
    private $school_building;
    private $staff_and_operations;
    private $reestablishment;
    private $images;

    public function __construct($data = null)
    {
        // Map the data to the class properties
        if (isset($data['personal_information'])) {
            $info = $data['personal_information'];

            $this->image = $info['images']['image'] ?? null;

            $this->names = $info['names'];
            $this->birth_life = $info['birth_life'];
            $this->education = $info['education'];
            $this->school_vision = $info['school_vision'];
            $this->school_building = $info['school_building'];
            $this->staff_and_operations = $info['staff_and_operations'];
            $this->reestablishment = $info['reestablishment'];
        }
    }

    public function getFullName()
    {
        return $this->names['status'] . ' ' . $this->names['first_name'] . ' ' . $this->names['middle_name'] . ' ' . $this->names['last_name'];
    }

    public function getEducation()
    {
        return $this->education;
    }

    public function getBirthLife()
    {
        return $this->birth_life['birth_event'] . ' ' . $this->birth_life['early_life'];
    }

    public function getSchoolBuilding()
    {
        return $this->school_building['location'] . ' ' . $this->school_building['donation_condition'] . ' ' . $this->school_building['structure'];
    }

    public function getSchoolVision()
    {
        return $this->school_vision['vision'] . ' ' . $this->school_vision['achievement'];
    }

    public function getStaffAndOperations()
    {
        return $this->staff_and_operations['initial_staff'] . ' ' . $this->staff_and_operations['betrayal_and_closure'];
    }

    public function getReestablishment()
    {
        return $this->reestablishment['new_school'] . ' ' . $this->reestablishment['fire_incident'] . ' ' . $this->reestablishment['legacy'];
    }

    public function getImageUrl()
    {
        return $this->image; 
    }
}
