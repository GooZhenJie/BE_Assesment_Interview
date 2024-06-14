<?php
session_start();
date_default_timezone_set('Asia/Kuala_Lumpur');

Question_1::checkDownload($_POST['memberType']);

class Question_1
{
  const NON_MEMBER = 0;
  const MEMBER = 1;

  const NON_MEMBER_DOWNLOAD_COOLDOWN = 5;
  const MEMBER_DOWNLOAD_COOLDOWN = 3;

  public static function checkDownload($memberType)
  {
    $isMember = '';
    if ($memberType === 'nonmember') $isMember = self::NON_MEMBER;
    else if ($memberType === 'member') $isMember = self::MEMBER;
    else {
      http_response_code(400);
      echo json_encode(array("error" => 'Invalid membership type. Please enter "member" or "nonmember".'));
      exit;
    }

    $isFirstTime = false;
    if (!isset($_SESSION['lastDownloadDate'])) {
      $isFirstTime = true;
      $_SESSION['firstDownloadDate'] = new DateTime('now');
      $_SESSION["lastDownloadDate"] = new DateTime('now');
    }

    $now = new DateTime('now');
    $diffLastDownload = $now->diff($_SESSION["lastDownloadDate"]);
    $diffFirstDownload = $now->diff($_SESSION['firstDownloadDate']);

    $downloadCooldown = $isMember ? self::MEMBER_DOWNLOAD_COOLDOWN : self::NON_MEMBER_DOWNLOAD_COOLDOWN;
    $diffMessage = $diffFirstDownload->h . ':' . $diffFirstDownload->m . ':' . $diffFirstDownload->s . ' ';

    if (($diffLastDownload->s === 0 && $isFirstTime) || $diffLastDownload->s >= $downloadCooldown) {
      $_SESSION["lastDownloadDate"] = $now;
      echo json_encode(array("message" => $diffMessage . 'execute checkDownload(\'' . $memberType . '\') returns "Your download is starting..."'));
    } else {
      http_response_code(400);
      echo json_encode(array("error" => $diffMessage . 'execute checkDownload(\'' . $memberType . '\') "Too many downloads." (cooldown: ' . $downloadCooldown - $diffLastDownload->s . 's)'));
      exit;
    }
  }
}
