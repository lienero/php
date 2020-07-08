<?php
ini_set('date.timezone', 'asia/Seoul');
echo "현재 시간은 ". date("Y년 m월 d일 H시 i분 s초", time());

$start_Time = mktime(11,00,00,07,8,2020);
$end_Time = mktime(12,00,00,07,8,2020);
if($start_Time <= time() && $end_Time > time()) {
    echo "수업이 시작되었습니다.";
} else {
    echo "수업이 끝났습니다.";
}
echo "<br/>";
?>