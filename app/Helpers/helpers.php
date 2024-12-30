<?php
use App\Models\State;
use App\Models\District;
use App\Models\Office;
use App\Models\UserType;
use App\Models\User;
use Carbon\Carbon;

function getstate($statecode)
{
  $statename = State::where('statecode', $statecode)->pluck('statname');
  return $statename[0];
}

function getdist($districtcode)
{
  $districtname = District::where('districtcode', $districtcode)->pluck('districtname');
  return $districtname[0];
}

function getoffice($officecode)
{
  $officename = Office::where('officecode', $officecode)->pluck('officename');
  return $officename[0];
}

function getusertype($usertypecode)
{
  $usertypename = UserType::where('usertypecode', $usertypecode)->pluck('usertypename');
  return $usertypename[0];
}
function getusername($userid)
{
  //dd($userid);
  $username = User::where('userid', $userid)->pluck('name')->first();
  //dd($username);
  return $username;
}

if (!function_exists('parseDate')) {
  /**
   * Format a given date or Carbon instance to dd-mm-yyyy format.
   *
   * @param mixed $date
   * @return string
   */
  function parseDate($date)
  {
    // Check if $date is already a Carbon instance, otherwise create it
    $carbonDate = ($date instanceof Carbon) ? $date : Carbon::parse($date);

    // Return the date in dd-mm-yyyy format
    return $carbonDate->format('d-m-Y');
  }

}













?>