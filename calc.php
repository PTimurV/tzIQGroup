<?php

$date = isset($_POST['date']) ? $_POST['date'] : '';
$amount = isset($_POST['amount']) ? intval($_POST['amount']) : 0;
$term = isset($_POST['term']) ? intval($_POST['term']) : 0;
$replenish = isset($_POST['replenish']) ? $_POST['replenish'] : '';
$replenishAmount = isset($_POST['replenishAmount']) ? intval($_POST['replenishAmount']) : 0;


$percent = 10; 
$daysInYear = 365; 

$sum = $amount;
if ($replenish == '1') {
    for ($i = 0; $i < $term; $i++) {
        for($j = 0; $j < 12; $j++){
            for ($i = 0; $i < 12; $i++) {
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, date('n', strtotime($date)), date('Y', strtotime($date)));
            $sum += ($sum+$replenishAmount) * $daysInMonth * ($percent / 100 / $daysInYear);
            $date = date('Y-m-d', strtotime($date . ' +1 month'));
            }
        }
    }
} else {
    for ($i = 1; $i <= $term; $i++) {
        for ($i = 0; $i < 12; $i++) {
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, date('n', strtotime($date)), date('Y', strtotime($date)));
            $sum += $sum * $daysInMonth * ($percent / 100 / $daysInYear);
            $date = date('Y-m-d', strtotime($date . ' +1 month'));
        }
    }
}

echo json_encode(['result' => $sum]);
?>
