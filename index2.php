<!DOCTYPE html>
<html lang="en">

  <head>

    <style>

    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REDIAL-2020</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3G45QTZSB8"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-3G45QTZSB8');
    </script>
  </head>

  <body>

    <!-- Check if the smiles is submitted -->
    <?php

        // To suppress warnings while leaving all other error reporting enabled-> (refer - https://stackoverflow.com/questions/1987579/remove-warning-messages-in-php)
        error_reporting(E_ALL ^ E_WARNING);

        // Turn off all error reporting OR If you don't want to show warnings as well as errors use ->
        // error_reporting(0);
      if (!empty($_POST['submit'])){

        $smiles = $_POST['smiles'];
        $server = $_ENV['REST_API_PROXY_SERVER'];

        $url = 'https://'.$server.'/predict';
        $data = array('smiles' => $smiles);

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        
        if ($result == FALSE){
          echo "ERROR: COULDN'T MAKE THE PREDICTIONS. TRY AGAIN.";
          include "error.php";
        }

        else{

            $result_ar = json_decode($result, true);

            // Check if Theory navigation is clicked
            if(array_key_exists("error_flag",$result_ar) and $result_ar['error_flag'] == "TRUE"){
                    echo "ERROR: COULDN'T MAKE THE PREDICTIONS. TRY AGAIN.";
                    include "error.php";
            } else{

                    // Sort by descending tanimoto /////////////////////////////////////////////
                    // refer - https://stackoverflow.com/questions/2699086/how-to-sort-multi-dimensional-array-by-value
                    function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
                        $sort_col = array();
                        foreach ($arr as $key=> $row) {
                            $sort_col[$key] = $row[$col];
                        }

                        array_multisort($sort_col, $dir, $arr);
                    }

                    // Sorting NCATS similarity table
                    array_sort_by_column($result_ar['similarity_results'], 'tanimoto');

                    // Sorting 3CL similarity table
                    array_sort_by_column($result_ar['three_cl_similarity_results'], 'tanimoto');
                    //////////////////////////////////////////////////////////////

                    include "navigation.php";
                    include "show_result.php";
            }

        }

      } else {

            // Check if Theory navigation is clicked
            if(isset($_GET['theory'])){
            include "theory.php";
            }

            // Check if Contact navigation is clicked
            else if(isset($_GET['contact'])){
            include "contact.php";
            }


            else{
            include "navigation.php";
            include "form.php";
            }
      }

    ?>

  </body>

<!-- Hover popup, refer - https://semantic-ui.com/modules/popup.html -->
<script>
    $('.activating.element')
    .popup()
    ;
</script>

</html>
