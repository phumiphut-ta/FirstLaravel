<?php
function genderText($gender)
{
    return $gender == 'M' ? 'Male' : 'Female';
}
function genderImages($gender)
{
    return $gender == 'M' ? '/images/male.png' : '/images/female.png';
}
?>