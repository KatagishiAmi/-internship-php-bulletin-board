<?php
    $pass = "mission3-5end";
?>
         
    <?php
         // PHP 新規投稿フォーム　始まり
        if(isset($_POST["name"]) and isset($_POST["comment"]) and $_POST["name"] != "" and $_POST["comment"] != "" and $_POST["pass"] == $pass){
            $fp = fopen("mission3-5.txt","a+");
            fwrite($fp,(count(file("mission3-5.txt"))+1)."<>");
            fwrite($fp,$_POST["name"]."<>");
            fwrite($fp,$_POST["comment"]."<>");
            fwrite($fp,$_POST["pass"]."<>");
            fwrite($fp,date("Y年m月d日 H時i分s秒").PHP_EOL);
            fclose($fp);
            
            $fp_hp = fopen("mission3-5.txt","a+");
             for($i = 0;$i < count(file("mission3-5.txt"));$i++){
               $lines = file("mission3-5.txt");
               $explosion = explode("<>",$lines[$i]);
             //   $explosion = str_replace("<>"," ",$lines[$i]);
                echo $explosion[0]."  ".$explosion[1]."  ".$explosion[2]."  ".$explosion[4]."<br>";
            }
            fclose($fp_hp);
        }else {
            echo "";
        }         
        // PHP 新規投稿フォーム 終わり
    ?>

    <?php
         //PHP  削除フォーム 始まり
         if(isset($_POST["delete"]) and $_POST["pass"] == $pass){
         $delete_number = ($_POST["delete"]-1);
         $fp_de = fopen("mission3-5.txt","a+");
         $myfile = file("mission3-5.txt");
         unset($myfile[$delete_number]);
         file_put_contents("mission3-5.txt",$myfile);
         fclose($fp_de);
         $myfile = file("mission3-5.txt");
         $lines = file("mission3-5.txt");
         $contents = array();
            for($i = 0;$i < count(file("mission3-5.txt"));$i++){
               $explosion = explode("<>",$lines[$i]);
               $explosion[0] = $i+1;
               $content = $explosion[0]."<>".$explosion[1]."<>".$explosion[2]."<>".$explosion[3]."<>".$explosion[4];
               array_push($contents,$content);
               echo $explosion[0]."  ".$explosion[1]."  ".$explosion[2]."  ".$explosion[4]."<br>";
            }
            $fp_con = fopen("mission3-5.txt" ,"w");
            fclose($fp_con);
            $fp_con_re = fopen("mission3-5.txt" ,"a+");
            for($i = 0;$i <count($contents);$i++){
                fwrite($fp_con_re,$contents[$i]);
            }
            fclose($fp_con_re);
            } else {
             echo "";
         }
         //  PHP  削除フォーム 終わり
    ?>

     <!-- PHP 編集フォーム 始まり -->
     <?php
         if(isset($_POST["edit_num"]) and isset($_POST["edit_name"]) and isset($_POST["edit_comment"]) and $_POST["edit_num"] != "" and $_POST["pass"] == $pass){
             echo "成功";
             $myfile = file("mission3-5.txt");
             $edit_num = $_POST["edit_num"]-1;
             $edit_name = $_POST["edit_name"];
             $edit_comment = $_POST["edit_comment"];
             $edit_pass = $_POST["pass"];
             $edit_date = date("Y年m月d日 H時i分s秒");
             $content = ($edit_num+1)."<>".$edit_name."<>".$edit_comment."<>".$edit_pass."<>".$edit_date.PHP_EOL;
             $myfile_array = array();
             $test = str_replace($myfile[$edit_num],$content,$myfile);
             // echo $content;
             // echo $test[$edit_num];
             echo ($edit_num+1)."  ".$edit_name,"  ".$edit_comment."  ".$edit_date;
             for($i = 0;$i<count($myfile);$i++){
                 array_push($myfile_array,$test[$i]);
             }
             $fp_edit = fopen("mission3-5.txt","w");
             fclose($fp_edit);
             $fp_edit_add = fopen("mission3-5.txt","a+");
             for($i = 0;$i<count($myfile_array);$i++){
                 fwrite($fp_edit_add,$myfile_array[$i]);
             }
             fclose($fp_edit_add);
         }else {
             echo "";
         }
         ?>
    <!-- PHP 編集フォーム 終わり -->