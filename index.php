<?php
  if (!empty($_GET['q'])) {
    switch ($_GET['q']) {
      case 'info':
        phpinfo(); 
        exit;
      break;
    }
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Status FlashKaza RP</title>

        <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
                background-color: black;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Karla';
            }

            .container {
                text-align: center;
                display: ;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
                color: white;
            }

            .opt {
                margin-top: 30px;
            }

            .opt a {
              text-decoration: none;
              font-size: 150%;
            }

            a:hover {
              color: red;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="info"><br />
                    <?php
                    /*-----------------------[ AYARLAR ]------------------------------*/
                    $server_settings['title'] = "FlashKaza RP"; // Display için sunucu adı
                    $server_settings['ip'] = "138.201.52.27"; // Sunucu bağlantısı için IP adresi
                    $server_settings['port'] = "30120"; // Basic port 30120 olmalı (eğer değiştirilmediyse)
                    $server_settings['max_slots'] = 64; // Max Player Slot (Varsayılan 64)
                    /*----------------------------------------------------------------*/
                    print "<div style='background-color: #f2f2f2; border: 4px double black; border-radius: 5px; width: 300px; padding: 2px; border: 4px double black;'>";
                    $content = json_decode(file_get_contents("http://".$server_settings['ip'].":".$server_settings['port']."/info.json"), true);
                    $img_d64 = $content['icon'];
                    if($content):
                        $gta5_players = file_get_contents("http://".$server_settings['ip'].":".$server_settings['port']."/players.json");
                        $content = json_decode($gta5_players, true);
                        $pl_count = count($content);
                        $SRV_STATUS = "<font style='color:lime;font-weight:bold'>Online</font>";
                        if($img_d64) { print "<div align='center'><img  width='150' src='data:image/png;base64, $img_d64' ></div>"; }
                        print "<p align='center' style='color:#000000; background-color: #ffffff;'><strong>$server_settings[title]</strong></p>";
                        print "<p align='center'><strong>Players:</strong> $pl_count / $server_settings[max_slots]</p>";
                    else:
                        print "<p align='center' style='color:#000000; background-color: #ffffff;'><strong>$server_settings[title]</strong></p>";
                        $SRV_STATUS = "<font style='color: red;'>Offline</font>";
                    endif;
                    print "<br/><hr/><p align='center'><strong>Status: $SRV_STATUS</strong></p></div>";
                    ?>
                </div>
            </div>
		</div>
        <div class="container">
            <div class="content">
                <div class="info"><br />
                    <?php
                    /*-----------------------[ AYARLAR ]------------------------------*/
                    $server_settings['title'] = "FlashKaza Dev"; // Display için sunucu adı
                    $server_settings['ip'] = "flashkaza.com"; // Sunucu bağlantısı için IP adresi
                    $server_settings['port'] = "30120"; // Basic port 30120 olmalı (eğer değiştirilmediyse)
                    $server_settings['max_slots'] = 64; // Max Player Slot (Varsayılan 64)
                    /*----------------------------------------------------------------*/
                    print "<div style='background-color: #f2f2f2; border: 4px double black; border-radius: 5px; width: 300px; padding: 2px; border: 4px double black;'>";
                    $content = json_decode(file_get_contents("http://".$server_settings['ip'].":".$server_settings['port']."/info.json"), true);
                    $img_d64 = $content['icon'];
                    if($content):
                        $gta5_players = file_get_contents("http://".$server_settings['ip'].":".$server_settings['port']."/players.json");
                        $content = json_decode($gta5_players, true);
                        $pl_count = count($content);
                        $SRV_STATUS = "<font style='color:lime;font-weight:bold'>Online</font>";
                        if($img_d64) { print "<div align='center'><img  width='150' src='data:image/png;base64, $img_d64' ></div>"; }
                        print "<p align='center' style='color:#000000; background-color: #ffffff;'><strong>$server_settings[title]</strong></p>";
                        print "<p align='center'><strong>Players:</strong> $pl_count / $server_settings[max_slots]</p>";
                    else:
                        print "<p align='center' style='color:#000000; background-color: #ffffff;'><strong>$server_settings[title]</strong></p>";
                        $SRV_STATUS = "<font style='color: red;'>Offline</font>";
                    endif;
                    print "<br/><hr/><p align='center'><strong>Status: $SRV_STATUS</strong></p></div>";
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>