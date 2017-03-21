<?php
//Setting local DB
$db_host = 'citymoto.mysql.ukraine.com.ua';
$db_username = 'citymoto_traloc';
$db_password = 'jasu58fn';
$db_database = 'citymoto_traloc';

$link = mysqli_connect($db_host, $db_username, $db_password, $db_database);

if(mysqli_connect_errno()){
    mail($constant['Email'], 'Ошибка в подключении к БД ', 'Временно недостен контроль лимитов кампаний' );
    exit();
}

$sql = "SELECT * FROM `monitorings`";

$result = mysqli_query($link, $sql);

$local_companies = mysqli_fetch_all($result, 1);

//get Setting
$sql_setting = "SELECT * FROM `settings`";

$result_setting = mysqli_query($link, $sql_setting);

$settings = mysqli_fetch_all($result_setting, 1);
$constant = [];
foreach ($settings as $key => $setting ) {
    $constant[$setting['name']] = $setting['description'];
}

//Exp connect
$link_exp = mysqli_connect($constant['DB_HOST'], $constant['DB_USERNAME'], $constant['DB_PASSWORD'], $constant['DB_DATABASE']);

if(mysqli_connect_errno()){
    mail($constant['Email'], 'Ошибка в подключении к БД ', 'Временно недостен мониторинг кампаний Keitaro TDS' );
    exit();
}

$sql_exp = "SELECT * FROM `keitaro_index_campaigns`";

$result_exp = mysqli_query($link_exp, $sql_exp);

$exp_companies = mysqli_fetch_all($result_exp, 1);

foreach($local_companies as $local_company ){
    $id = $local_company['id'];
    foreach($exp_companies as $exp_company){
        if($local_company['company_id'] == $exp_company['campaign_id'] && $local_company['reported'] == 1 ){
            if($local_company['type'] == "sales"){
                $val = $exp_company['sales'];
                if($local_company['comparison'] == 0){
                    if($val > $local_company['limit']){
                        sendEmail($constant['Email'], $local_company['name'], $local_company['comparison'], $local_company['limit'], $local_company['type']);
                        updateStatus($id, $link);
                    }
                }
                elseif($local_company['comparison'] == 1){
                    if($val < $local_company['limit']){
                        sendEmail($constant['Email'], $local_company['name'], $local_company['comparison'], $local_company['limit'], $local_company['type']);
                        updateStatus($id, $link);
                    }
                }
            }
            elseif($local_company['type'] == "cost"){
                $val = $exp_company['cost'];
                if($local_company['comparison'] == 0){
                    if( $val > $local_company['limit']){
                        sendEmail($constant['Email'], $local_company['name'], $local_company['comparison'], $local_company['limit'], $local_company['type']);
                        updateStatus($id, $link);
                    }
                }
                elseif($local_company['comparison'] == 1){
                    if($val < $local_company['limit']){
                        sendEmail($constant['Email'], $local_company['name'], $local_company['comparison'], $local_company['limit'], $local_company['type']);
                        updateStatus($id, $link);
                    }
                }
            }
        }
    }
}
function sendEmail($email, $company_name, $comparison, $limit, $type){
    if($type == "sales"){
        $type_category = "Продажи";
    }
    elseif($type == "cost"){
        $type_category = "Расход";
    }
    if($comparison == 0){
        $direction = ">";
    }
    elseif($comparison == 1){
        $direction = "<";
    }
    mail($email, "Мониторинг лимитов Keitaro TDS", 'Кампания ' . $company_name  . ' достигла указанного значения лимита - (' . $direction . ' ' . $limit  .') в категории -  ' . $type_category  );
}
function updateStatus($id, $link){
    $sql_change_status = "update monitorings set reported='0' where id='".$id."'";
    mysqli_query($link, $sql_change_status);

}