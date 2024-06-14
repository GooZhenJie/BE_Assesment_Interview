<?php
Question_2::checkDiscount($_POST['purchaseValue']);

class Question_2
{
  const DISCOUNT_RATE = 0.05;

  public static function checkDiscount($purchaseValue)
  {
    $message = '';

    if (!is_numeric($purchaseValue)) {
      $message = "Please enter a valid numeric value for the purchase amount.";
      return $message;
    }

    $discountRate = $purchaseValue >= 300 ? self::DISCOUNT_RATE : 0;
    $discount = $discountRate * 100;
    $message = $purchaseValue >= 300 ? "Purchase Value is $purchaseValue , discount is $discount%." : "Purchase Value is $purchaseValue , there are no discount.";

    echo json_encode(array("message" => $message));
  }
}
