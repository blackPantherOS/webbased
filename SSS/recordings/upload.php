<?php// this is the upload dir where files will go.//Don't remove the ///Chmod it (777)$upload_dir = "uploaded/";   //change to whatever you want.//153600 bytes = 150KB$size_bytes = 153600; //File Size in bytes (change this value to fit your need)//Do you want to limit the extensions of files uploaded (yes/no)$extlimit = "yes"; //Extensions you want files uploaded limited to.$limitedext = array(".gif",".jpg",".png",".jpeg");          //check if the directory exists or not.          if (!is_dir("$upload_dir")) {	     die ("The directory <b>($upload_dir)</b> doesn't exist");          }          //check if the directory is writable.          if (!is_writeable("$upload_dir")){             die ("The directory <b>($upload_dir)</b> is NOT writable, Please CHMOD (777)");          }?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html><head><link rel="stylesheet" type="text/css" href="gallery.css"></head><body><div class="container-wrapper">  <div class="container">    <table align="center">      <tr align="center">        <td width="736px"><div class="nav">Upload Photos</div></td>      </tr>      <tr align="center">        <td><?php	    if($uploadform) // if you clicked the (Upload File) button. "If you submitted the form" then upload the file.  		{//begin of if($uploadform).              //check if no file selected.              if (!is_uploaded_file($_FILES['filetoupload']['tmp_name']))              {                     echo "Error: Please select a file to upload!. <br>�<a href=\"$_SERVER[PHP_SELF]\">back</a>";                     exit(); //exit the script and don't do anything else.              }              //Get the Size of the File              $size = $_FILES['filetoupload']['size'];              //Make sure that file size is correct              if ($size > $size_bytes)              {                    $kb = $size_bytes / 1024;                    echo "File Too Large. File must be <b>$kb</b> KB. <br>�<a href=\"$_SERVER[PHP_SELF]\">back</a>";                    exit();              }              //check file extension              $ext = strrchr($_FILES['filetoupload'][name],'.');              if (($extlimit == "yes") && (!in_array($ext,$limitedext))) {                    echo("Wrong file extension. ");                    exit();              }              // $filename will hold the value of the file name submetted from the form.              $filename =  $_FILES['filetoupload']['name'];              // Check if file is Already EXISTS.              if(file_exists($upload_dir.$filename)){                    echo "Oops! The file named <b>$filename </b>already exists. <br>�<a href=\"$_SERVER[PHP_SELF]\">back</a>";                    exit();              }              //Move the File to the Directory of your choice              //move_uploaded_file('filename','destination') Moves afile to a new location.              if (move_uploaded_file($_FILES['filetoupload']['tmp_name'],$upload_dir.$filename)) {                  //tell the user that the file has been uploaded and make him alink.                  echo "File \"$filename\" uploaded! <br>�<a href=\"$_SERVER[PHP_SELF]\">upload again</a> | <a href=\"index_script.php?gal=uploaded&page=1\">view uploaded photos</a>";                  exit();              }                  // print error if there was a problem moving file.                  else              {                  //Print error msg.                  echo "There was a problem moving your file. <br>�<a href=\"$_SERVER[PHP_SELF]\">back</a>";                  exit();              }  }//end of if($uploadform).#---------------------------------------------------------------------------------#// If the form has not been submitted, display it!else  {//begin of else        ?>          <h4>::Browse a File to Upload:</h4>          <i>- Allowed Extensions:</i> <b>          <?        // print the file extensions        for($i=0;$i<count($limitedext);$i++)	{		if (($i<>count($limitedext)-1))$commas=", ";else $commas="";		list($key,$value)=each($limitedext);		echo $value.$commas;	}	?>          </b> <br>          <i>- Max File Size</i> = <b><?echo $size_bytes / 1024; ?> KB </b> <br>          <form method="post" enctype="multipart/form-data" action="<?php echo $PHP_SELF ?>">            <br>            <input type="file" name="filetoupload">            <br>            <input type="hidden" name="MAX_FILE_SIZE" value="<?echo $size_bytes; ?>">            <br>            <input type="Submit" name="uploadform" value="Upload File">          </form>          <?    }//end of else?></td>      </tr>    </table>  </div></div></body></html>