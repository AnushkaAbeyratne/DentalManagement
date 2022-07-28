<?php
include '../model/backup_model.php';
$backupObj = new backup();
if(isset($_REQUEST["status"])) {


    $status = $_REQUEST["status"];
    switch ($status) {

        case "makeBackup":

            $tables = array();
            $showTables = $backupObj->showTables();

            while ($row = $showTables->fetch_row()){
                $tables[] = $row[0];
            }

            $output = '';
            foreach ($tables as $table){
                $selectTables = $backupObj->selectTable($table);

                $num_fields = $selectTables->field_count; // number of columns
                $num_rows = $selectTables->num_rows; //number of rows
                $output.= 'DROP TABLE IF EXISTS '.$table.';';
                $getCreateTable = $backupObj->getCreateTable($table);
                $getCreateTableResult = $getCreateTable->fetch_row();
                $output.= "\n\n".$getCreateTableResult[1].";\n\n";
                $counter = 1;

                for ($i = 0; $i <$num_fields; $i++){
                    while ($row = $selectTables->fetch_row()){
                        if ($counter == 1){
                            $output.= 'INSERT INTO '.$table.' VALUES(';
                        }else{
                            $output.= '(';
                        }

                        for ($j = 0; $j <$num_fields; $j++){
                            $row[$j] = addslashes($row[$j]);

                            $row[$j] = str_replace("\n","\\n", $row[$j]);

                            if (isset($row[$j])){
                                $output.='"'.$row[$j].'"';
                            } else {
                                $output.='""';
                            }
                            if ($j<($num_fields-1)){
                                $output.=',';
                            }
                        }

                        if($num_rows == $counter){
                            $output.= ");\n";
                        }else{
                            $output.="),\n";
                        }
                        ++$counter;
                    }
                }
                $output.= "\n\n\n";
            }
            date_default_timezone_set("Asia/Colombo");
            $file ='../backup/db-backup-'.date("D M j G-i-s T Y",time()).'-'.(sha1(implode(',',$tables))).'.sql';
            $handle = fopen($file, 'w+');
            fwrite($handle, $output);
            fclose($handle);

            $backupObj->addBackup($file);

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            unlink($file);

        break;
    }
}


