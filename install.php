<?php
/*
 * RadioCloud - Cloud Radio Automation System
 *
 * 2018 Radixu Irratia - www.radixu.info
 * 		Aritz Olea <aritzolea@gmail.com>
 */

 // Instalazioa
 require_once("install/default.inc.php");

 // Include ezSQL core
include_once "sql/shared/ez_sql_core.php";

 // Include ezSQL database specific component
include_once "sql/mysqli/ez_sql_mysqli.php";

 

switch($_GET['step'])
{
    case 1: // install database
        if ($_POST)
        {
            $db = new ezSQL_mysqli();
            $host = $_POST['host'];
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $dbname = $_POST['database'];
            
            
            if ($db->quick_connect($user,$pass,$dbname,$host) != true) 
                echo '<br/><p align="center"><button type="button" class="btn btn-danger">Datu basera konektatzean akatsa. Egiaztatu datuak.</button>';
            else {
                /* Dump DB */
                $fp = fopen('database.sql', 'r');
                $fline = "";
                while (($line = fgets($fp)) !== false) {
                    if (empty($line) || substr($line, 0, 2) == '--' || substr($line, 0, 2) == '/*') 
                        continue;
                    $fline .= $line;
                    if (substr(trim($line), -1, 1) == ';') {
                        $db->query($fline);
                        $fline = '';
                    }
                }
                fclose($fp);
                
                /* Write info to config file */
                $file = 'include/config.inc.php';
                $newconfig = '<?php
/*
 * RadioCloud - Cloud Radio Automation System  
 */  

// Datubasearen konfigurazioa
                 
$glob[\'db\'] = Array(  
"user" => "'.$user.'",  
"pass" => "'.$pass.'",  
"izena" => "'.$dbname.'",  
"host" => "'.$host.'"  
);    
                                   
define("MODULE_PATH", "modules");  
?>'; 

                file_put_contents($file, $newconfig);

                /* Next step: configuration */
                echo '<br/><p align="center"><button type="button" onclick="location.href=\'install.php?step=2\'" class="btn btn-success">Datubasea instalatuta! Klik hemen hurrengo pausura jotzeko.</button></p>';
            }
            die();
        }
        $tpl_content = $HTMLOutput->GetFileContent('s1_database.tpl', array());

        $menu = $HTMLOutput->GetFileContent('menu_s1.tpl', array());
        break;
    case 2: // configuration things
        require_once("include/config.inc.php");
        require_once("include/db.init.php");
        
        if ($_POST)
        {
            if (!empty($_POST['name']))
                $db->query("UPDATE config SET value='".$db->escape($_POST['name'])."' WHERE var='radioname'");
            if (!empty($_POST['slogan']))
                $db->query("UPDATE config SET value='".$db->escape($_POST['slogan'])."' WHERE var='radiodescription'");
            if (!empty($_POST['audio_format']))
                $db->query("UPDATE config SET value='".$db->escape($_POST['audio_format'])."' WHERE var='audioformat'");
            if (!empty($_POST['audio_quality']))
                $db->query("UPDATE config SET value='".$db->escape($_POST['audio_quality'])."' WHERE var='audioquality'");
            if (!empty($_POST['radiocloud_dir']))
                $db->query("UPDATE dirs SET dirpath='".$db->escape($_POST['radiocloud_dir'])."' WHERE dirname='radiocloud_dir'");
            if (!empty($_POST['radiocore_dir']))
                $db->query("UPDATE dirs SET dirpath='".$db->escape($_POST['radiocore_dir'])."' WHERE dirname='radiocore_dir'");
            
            echo '<br/><p align="center"><button type="button" onclick="location.href=\'install.php?step=3\'" class="btn btn-success">Konfigurazioa eguneratu da. Azken pausurako klik egin hemen.</button></p>';

            die();
        }
        
        $tpl_content = $HTMLOutput->GetFileContent('s2_config.tpl', array("RADIOCLOUD_DIR" => getcwd()));

        $menu = $HTMLOutput->GetFileContent('menu_s2.tpl', array());
        break;
    case 3: // next steps info
        $tpl_content = $HTMLOutput->GetFileContent('s3_message.tpl', array());

        $menu = $HTMLOutput->GetFileContent('menu_s3.tpl', array());
        break;
    default: // welcome page
        $menu = $HTMLOutput->GetFileContent('menu_s0.tpl', array());
        
        // Check extensions
        $extensioak = array("curl", "ldap", "mysqli", "gd", "openssl");
        $error = 0;
        $extension_list = "";
        foreach ($extensioak as $ex) {
            if (!extension_loaded($ex)) {
                $name = $ex;
                $status = "<b>Akatsa</b>";
                $info = "PHPko extensio hau kargatu gabe dago. Instala ezazu, beharrezkoa da software hau erabili ahal izateko";
                $error = 1;
            } else {
                $name = $ex;
                $status = "Ados";
                $info = "PHPko extensio hau kargatuta dago.";
            }
            
            $extension_list .= $HTMLOutput->GetFileContent('s0_extension.tpl', array("EXT" =>$name, "STATUS"=>$status, "INFO"=>$info));
        }
        
        // Check if config file is writable
        
        if (!is_writable(getcwd()."/include/config.inc.php"))
        {
                $name = "include/config.inc.php";
                $status = "<b>Akatsa</b>";
                $info = "Konfigurazio-fitxategia ezin da idatzi. Aldatu baimenak idatzi ahal izateko.";
                $error = 1;
        } else {
                $name = "include/config.inc.php";
                $status = "Ados";
                $info = "Konfigurazio-fitxategia idatzi daiteke.";
        }
        $extension_list .= $HTMLOutput->GetFileContent('s0_extension.tpl', array("EXT" =>$name, "STATUS"=>$status, "INFO"=>$info));

        if ($error)
        {
            $extension_list .= '<br/><p align="center"><button type="button" class="btn btn-danger">Egiaztapenean erroreak egon dira, begiratu eta konpon itzazu. Ondoren, itzuli eta instalazioarekin jarraitu</button>';
        } else {
            $extension_list .= '<br/><p align="center"><button type="button" onclick="location.href=\'install.php?step=1\'" class="btn btn-success">Dena ondo! Egin klik hemen hurrengo pausura jarraitzeko.</button></p>';
        }
        
        $tpl_content = $HTMLOutput->GetFileContent('s0_welcome.tpl', array("CHECKS" => $extension_list));

        break;
}

// Load main template and more
echo $HTMLOutput->GetFileContent('base.tpl', array("MAIN_MENU" => $menu, "FOOTER" => "", "CONTENT" => $tpl_content, "RADIONAME" => "RadioCloud", "RADIODESCRIPTION" => "Instalatzailea"));
 
?>
