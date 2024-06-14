<?php
Question_3::calculateDayIntervals($_POST['startDate'], $_POST['endDate']);

class Question_3
{
  public static function calculateDayIntervals($startDate, $endDate)
  {
    $startDate = self::parseDate($startDate);
    $endDate = self::parseDate($endDate);

    $interval = $startDate->diff($endDate)->days;
    $message = 'Day Interval: ' . $interval;
    $interval % 2 === 0 ? $message .= ' (isEven)' : $message .= ' (isOdd)';
    echo json_encode(array('message' => $message));
  }

  public static function parseDate($dateString)
  {
    $formats = [
      'Y-m-d',
      'm/d/Y',
      'd/m/Y',
      'Y-m-d H:i:s',
      'm/d/Y, h:i:s A',
      'd-m-Y',
      'd.m.Y',
      'Y-m-d\TH:i:sP',
    ];

    foreach ($formats as $format) {
      $date = DateTime::createFromFormat($format, $dateString);
      if ($date && $date->format($format) === $dateString) {
        return $date;
      }
    }

    http_response_code(400);
    echo json_encode(array("error" => "Unknown date format: $dateString."));
    exit;
  }
}
