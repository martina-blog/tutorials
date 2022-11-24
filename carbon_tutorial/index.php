<?php require 'vendor/autoload.php';
use Carbon\Carbon;

$today = Carbon::today();
$tomorrow = Carbon::tomorrow();
$yesterday = Carbon::yesterday();

echo "Today: $today \n";
echo "Tomorrow: $tomorrow \n";
echo "Yesterday: $yesterday \n";

$now = Carbon::now();
echo "Now: $now \n";

// Timezone
//America/Toronto

$now = Carbon::now('Pacific/Rarotonga');
$today = Carbon::today('Pacific/Rarotonga');
$tomorrow = Carbon::tomorrow('Pacific/Rarotonga');
$yesterday = Carbon::yesterday('Pacific/Rarotonga');

echo "Today: $today \n";
echo "Tomorrow: $tomorrow \n";
echo "Yesterday: $yesterday \n";
echo "Now: $now \n";

$year = 2022;
$month = 5;
$day = 24;
$hour = 15;
$minutes = 25;
$seconds = 15;

$tz = 'Europe/Madrid';

echo Carbon::createFromDate($year, $month, $day, $tz) . " \n";
echo Carbon::createFromTime($hour, $minutes, $seconds, $tz). " \n";
echo Carbon::createMidnightDate($year, $month, $day, $tz). " \n";
echo Carbon::create($year, $month, $day, $hour, $minutes, $seconds, $tz). " \n";

echo Carbon::createFromTimestamp(1669195779). " \n";

$datetime = Carbon::create(1918, 4, 5);
echo "Add a century: " . $datetime->addCentury() . " \n";
echo "Add 5 years: " . $datetime->addYears(5) . " \n";
echo "Subtract 7 quarters: " . $datetime->subQuarters(7) . " \n";
echo "Subtract 15 months: " . $datetime->subMonths(15) . "\n";
echo "Add 4 weekdays: " . $datetime->addWeekdays(4) . "\n";
echo "Subtract 55 weeks: " . $datetime->subWeeks(55) . "\n";
echo "Subtract one hour: " . $datetime->subHour() . "\n";
echo "Add 7 seconds: " . $datetime->addSeconds(7) . "\n";
echo "Add millenia: " . $datetime->addMillennia() . "\n";

$date1 = Carbon::create(2022, 10, 13, 15, 26, 14);
$date2 = Carbon::create(2022, 10, 15, 15, 26, 14);

echo "Is date1 equal to date2: " . ($date1->equalTo($date2) ? 'true' : 'false') . "\n";
echo "Is date1 not equal to date2: " . ($date1->notEqualTo($date2) ? 'true' : 'false') . "\n";
echo "Is date1 greater than date2: " . ($date1->greaterThan($date2) ? 'true' : 'false') . "\n";
echo "Is date1 greater than or equal to date2: " . ($date1->greaterThanOrEqualTo($date2) ? 'true' : 'false') . "\n";
echo "Is date1 less than date2: " . ($date1->lessThan($date2) ? 'true' : 'false') . "\n";

$date = Carbon::now();
echo "Year: ". $date->year. "\n";
echo "Month: ". $date->month. "\n";
echo "Day: ". $date->day. "\n";
echo "Hour: ". $date->hour. "\n";
echo "Minutes: ". $date->minute. "\n";
echo "Seconds: ". $date->second. "\n";
echo "Day of the week: ". $date->dayOfWeek. "\n";
echo "English day of the week: ". $date->englishDayOfWeek. "\n";
echo "English month: ". $date->englishMonth. "\n";

$date->year = 1995;
$date->month = 5;

echo "Year: ". $date->year. "\n";
echo "Month: ". $date->month. "\n";
echo "Day: ". $date->day. "\n";
echo "Hour: ". $date->hour. "\n";
echo "Minutes: ". $date->minute. "\n";
echo "Seconds: ". $date->second. "\n";
echo "Day of the week: ". $date->dayOfWeek. "\n";
echo "English day of the week: ". $date->englishDayOfWeek. "\n";
echo "English month: ". $date->englishMonth. "\n";

$date->year(1995)->month(5);

$date = Carbon::create(2022, 4, 12, 13,45,45);

echo $date->toDateString() . "\n";
echo $date->toFormattedDateString() . "\n";
echo $date->toTimeString() . "\n";
echo $date->toDateTimeString() . "\n";
echo $date->toDayDateTimeString() . "\n";

$date = Carbon::create(2021, 10, 14, 14, 18, 25);
echo $date->format('l, jS \of F - H:i:s A') . "\n";

$date1 = Carbon::create(2022, 6, 24);
$date2 = Carbon::create(2022, 6, 7);

echo "Difference in days: " . $date1->diffInDays($date2) . "\n";
echo "Difference in weeks: " . $date1->diffInWeeks($date2) . "\n";
echo "Difference in hours: " . $date1->diffInHours($date2) . "\n";

echo "Difference in days (human format): " . $date1->diffForHumans($date2) . "\n";