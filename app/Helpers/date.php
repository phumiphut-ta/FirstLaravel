<?php

use Carbon\Carbon;
function age($date)
{
    return Carbon::parse($date)->age;
}