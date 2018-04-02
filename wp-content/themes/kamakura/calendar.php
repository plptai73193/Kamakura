<?php
/**
 * 以下の条件のカレンダー情報を取得します
 * ・2015年1月1日～2015年12月31日まで
 * ・カレンダーの開始日時の昇順で取得
 * ・10件データを取得
 */
 //カレンダーの設定画面で見れるカレンダーID↓
//テスト美術館
$targets = $_GET["target"];
define('CALENDAR_ID', $targets);
//google consoleで作ったapiキー↓
define('API_KEY', 'AIzaSyD_JxIDU0_3MUjboNVVx68TEgOznOfUTF8');
define('API_URL', 'https://www.googleapis.com/calendar/v3/calendars/'.CALENDAR_ID.'/events?key='.API_KEY.'&singleEvents=true');
$t = $_GET["start"];
$t2 = $_GET["end"];
// ここでデータを取得する範囲を決めています
/*
if(!$t){
$t = mktime(0, 0, 0, 1, 1, 2017);
$t2 = mktime(0, 0, 0, 12, 31, 2017);
}
*/
$t = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
$t2 = mktime(23, 59, 59, date('m'), date('d'), date('Y'));$params = array();
$params[] = 'orderBy=startTime';
$params[] = 'maxResults=10';
$params[] = 'timeMin='.urlencode(date('c', $t));
$params[] = 'timeMax='.urlencode(date('c', $t2));

$url = API_URL.'&'.implode('&', $params);
// var_dump($url);
$results = file_get_contents($url);
 
$json = json_decode($results, true);
 
print_r($results);