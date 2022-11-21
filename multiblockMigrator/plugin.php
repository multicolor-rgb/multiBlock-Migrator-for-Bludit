<?php
    class multiMigrator extends Plugin {

        public function form()
    {

  global $security;
            $tokenCSRF = $security->getTokenCSRF();

    echo'

 <form>
<input type="hidden" id="jstokenCSRF" name="tokenCSRF" value="'.$tokenCSRF.'">

        <p style="margin:0;padding:0;margin-top:10px;">old domain adress</p>
    <input class="inputer form-control" required type="text" name="old" placeholder="http://youroldadress.com/" value="">
    <p style="margin:0;padding:0;margin-top:10px;">new domain adress</p>
    <input class="inputer" required type="text" name="new" placeholder="http://yournewadress.com/" value="'.DOMAIN.'/">
   <br>
    <input type="submit" name="replace" class="button-18 btn-primary btn"  value="Replace URL">
   
</form>
    ';


    echo '
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" style=" box-sizing:border-box;display:grid; width:100%;grid-template-columns:1fr auto; padding:10px;background:#fafafa;border:solid 1px #ddd;margin-top:20px;">
      <p style="margin:0;padding:0;"> buy me ☕ if you want saw new plugins:)</p>
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="KFZ9MCBUKB7GL">
      <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" border="0">
      <img alt="" src="https://www.paypal.com/en_PL/i/scr/pixel.gif" width="1" height="1" border="0">
    </form>';

        }


public function post(){



       if(isset($_POST['replace'])){

        $folder = PATH_CONTENT.'multiBlock/**/*.{txt,json}';
        foreach(glob($folder,GLOB_BRACE) as $file){

          $old = str_replace(" ","",$_POST['old']);
          $new = str_replace(" ","",$_POST['new']);


            $oldcontent = file_get_contents($file);
            $newcontent = str_replace(array($old,$old.'/'),array($new,$new.'/'),$oldcontent);

            
    
            file_put_contents($file,$newcontent);
    
     
             
    } 
    
    };


}



    }
?>