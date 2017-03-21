<?php
$link = mysqli_connect('citymoto.mysql.ukraine.com.ua','citymoto_traloc','jasu58fn','citymoto_traloc');

if(mysqli_connect_errno()){
    mail("vor.ser87@gmail.com", 'Ошибка в подключении к БД ', 'Временно недостен контроль лимитов кампаний' );
    exit();
}

$sql = "SELECT * FROM `monitorings`";

$result = mysqli_query($link, $sql);

$local_companies = mysqli_fetch_all($result, 1);

//Exp connect
$link_exp = mysqli_connect('citymoto.mysql.ukraine.com.ua','citymoto_trafic','2eads59b','citymoto_trafic');

if(mysqli_connect_errno()){
    mail("vor.ser87@gmail.com", 'Ошибка в подключении к БД ', 'Временно недостен мониторинг кампаний Keitaro TDS' );

    echo 'Ошибка в подключении к  Exp-БД';
    exit();
}

$sql_exp = "SELECT * FROM `keitaro_index_campaigns`";

$result_exp = mysqli_query($link_exp, $sql_exp);

$exp_companies = mysqli_fetch_all($result_exp, 1);

foreach($local_companies as $local_company ){
    foreach($exp_companies as $exp_company){
        if($local_company['company_id'] == $exp_company['campaign_id'] && $local_company['reported'] == 1 ){
            if($local_company['type'] == "sales"){
                $val = $exp_company['sales'];
                if($local_company['comparison'] == 0){
                    echo $val .' >' .$local_company['limit'];
                    if($val > $local_company['limit']){
                        mail("vor.ser87@gmail.com", "Мониторинг лимитов Keitaro TDS", 'Компания ' . $local_company['name'] . ' достигла указанного лимита (' . $local_company['limit'] .') в категории -  ' .$local_company['type']  );
                    }
                }
                elseif($local_company['comparison'] == 1){
                    echo $val .' <' .$local_company['limit'];
                    if($val < $local_company['limit']){
                        mail("vor.ser87@gmail.com", "Мониторинг лимитов Keitaro TDS", 'Компания ' . $local_company['name'] . ' достигла лимита ' . $local_company['limit'] .' по фильтру -  ' .$local_company['type']  );
                    }
                }
            }
            elseif($local_company['type'] == "cost"){
                $val = $exp_company['cost'];
                if($local_company['comparison'] == 0){
                    echo $val .' >' .$local_company['limit'];
                    if( $val > $local_company['limit']){
                        mail("vor.ser87@gmail.com", "Мониторинг лимитов Keitaro TDS", 'Компания ' . $local_company['name'] .'===>' . $local_company['comparison']. ' достигла лимита ' . $local_company['limit'] .' по фильтру -  ' .$local_company['type']  );
                    }
                }
                elseif($local_company['comparison'] == 1){
                    echo $val .' <' .$local_company['limit'];
                    if($val < $local_company['limit']){
                        mail("vor.ser87@gmail.com", "Мониторинг лимитов Keitaro TDS", 'Компания ' . $local_company['name'] .'<===' . $local_company['comparison'] . ' достигла лимита ' . $local_company['limit'] .' по фильтру -  ' .$local_company['type']  );
                    }
                }
            }
        }
    }
}