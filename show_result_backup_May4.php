<style>

h1 {
text-align: center;
}

button {
  float: left;
}

h3 {text-align: center;}

.container__table {
  /*height: 600px;*/
  /*width: 300px;*/
  overflow-x: auto;  /* or auto or manual or hidden*/
  overflow-y: auto;  /* or auto or manual or hidden*/

}

fieldset:hover a {
    text-decoration: none;
    color: red;
}

.hover_color:hover
{
    color: red;
    background-color:white;
}

.large.tooltip-inner {
   max-width: 100%;
   width: 100%;
   border-style: double;
    border-color: white;
    text-align: center;
    padding: 10px;
}

td.hovertable-red-text {
    color: red;
}

td.hovertable-green-text {
    color: green;
}

th {
    padding: 10px;
}

</style>



<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<!-- <div class="ui container"> -->

            <!-- Close Javascript window -->
            <h1>
                <form>
                          <button class="ui labeled icon button" onclick="window.close()">
                                <i class="left chevron icon"></i>
                                Back
                          </button>
                </form>
                RESULTS
            </h1>

      <div class="span3">
          <div class="ui segment">

            <div class="ui two column grid">
                <div class="column">
                     <?php echo '<img src="data:image/gif;base64,' . $result_ar["image"] . '" alt="' . $result_ar["processed_query_smiles"] .'" style="width:260px;height:255px;" /><br/>';?>

                      <label class="control-label"><p></p><h5><font color="#616D7E">Synonyms: </font></h5><p></p></label>
                      <?php echo '<b>'. $result_ar['synonyms'] . '</b>'; ?>
                      <br/>

                      <label class="control-label"><p></p><h5><font color="#616D7E">Processed SMILES string: </font></h5><p></p></label>
                      <br/>
                      <?php echo '<b>'. $result_ar['processed_query_smiles'] . '</b>'; ?>

                </div>

                <div class="column">

                        <table class="ui very basic collapsing celled table" border="0" cellpadding="0" cellspacing="0">
                              <thead>
                                    <tr><th>LogP (Log units)</th>
                                    <th>LogS (Log units)</th>
                                    <th>Molecular Wt. (g/mol)</th>
                                    <th>Formula</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php

                                    echo "<tr>
                                    <td>", $result_ar['logp'],  "</td>";
                                    echo "<td>", $result_ar['logs'], "</td>";
                                    echo "<td>", $result_ar['molecular_wt'], "</td>";
                                    echo "<td>", $result_ar['molecular_formula'], "</td>";
                                    "</tr>";

                                ?>
                              </tbody>
                        </table>

                        <br/>

                        <div class="well">
                            <h3> External reference: </h3>
                                <div class="container__table">
                                    <table class="ui celled table" border="0" cellpadding="0" cellspacing="0">
                                          <thead>
                                                <tr><th>PubChem CID</th>
                                                <th>Drug Central ID</th>
                                              </tr>
                                          </thead>
                                          <tbody>

                                            <?php

                                            echo "<tr>";

                                            if ($result_ar['pubchem_link'] == '-'){
                                                echo "<td>Not Found</td>";
                                            }

                                            else{
                                            echo "<td> <a href=", $result_ar['pubchem_link'],  " target='_self' class='hover_color'>",$result_ar['pubchem_cid'],"</a> </td>";
                                            }

                                            if ($result_ar['drug_central_link'] == '-'){
                                                echo "<td>Not Found</td>";
                                            }

                                            else{
                                            echo "<td> <a href=", $result_ar['drug_central_link'],  " target='_self' class='hover_color'>",$result_ar['drug_central_id'],"</a> </td>";
                                            }

                                            ?>

                                          </tbody>
                                    </table>
                                </div>
                        </div>

                </div>

            </div>

        </div>
      </div>

            <div class="well">
                <h3> Prediction Results </h3>
                    <div class="container__table">
                        <table class="ui celled structured table" border="0" cellpadding="0" cellspacing="0">

                              <thead>

                                    <tr>
                                      <th></th>
                                      <th>Class</th>
                                      <th>Prediction</th>
                                      <th>Confidence</th>
                                     
                                      </tr>


                              </thead>

                              <tbody>

                                    <tr>
                                      <td rowspan="2" class="center aligned activating element"><h3>Live Virus Infectivity</h3></td>
                                        <!-- The following two cells will appear under the same header -->
                                        
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=14" target='_self' class="hover_color">SARS-CoV-2 cytopathic effect (CPE)</a></td>
                                          <?php
                                                 if ($result_ar['Act_prediction'] == "ACTIVE"){
                                                     echo "<td><b><span class='badge bg-success ' 'data-position='left center'>", $result_ar['Act_prediction'], "</span></b></td>";
                                                     
                                                    if ($result_ar['Act_probability'] == 1){
                                                        echo "<td><b><span class='badge bg-success' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['Act_probability'], "</span></b></td>";
                                                    }
                                                    else{
                                                        
                                                        //echo '<td><b><span class="badge bg-success testtooltip" data-toggle="tooltip" data-html="true" data-container="body" data-placement="bottom" title="<table class=\'kpiTableHov\'><tr><th>Model</th><th>Prediction</th><th>Confidence</th></tr><tr><td>Des',$result_ar['ActDes_model'],'</td><td class=',getPredictionsColor($result_ar['ActDes_prediction']),'>',$result_ar['ActDes_prediction'],'</td><td class=',getPredictionsColor($result_ar['ActDes_prediction']),'>',$result_ar['ActDes_probability'],'</td></tr><tr><td>FP',$result_ar['ActFP_model'],'</td><td class=',getPredictionsColor($result_ar['ActFP_prediction']),'>',$result_ar['ActFP_prediction'],'</td><td class=',getPredictionsColor($result_ar['ActFP_prediction']),'>',$result_ar['ActFP_probability'],'</td></tr><tr><td>Topo',$result_ar['ActTopo_model'],'</td><td class=',getPredictionsColor($result_ar['Act_prediction']),'>',$result_ar['ActTopo_prediction'],'</td><td class=',getPredictionsColor($result_ar['ActTopo_prediction']),'>',$result_ar['ActTopo_probability'],'</td></tr></table>">',$result_ar['Act_probability'],'</td>';
                                                        hoverTable($result_ar['Act_prediction'],$result_ar['ActDes_model'],$result_ar['ActDes_prediction'],$result_ar['ActDes_probability'],$result_ar['ActFP_model'],$result_ar['ActFP_prediction'],$result_ar['ActFP_probability'],$result_ar['ActTopo_model'],$result_ar['ActTopo_prediction'],$result_ar['ActTopo_probability'],$result_ar['Act_probability']);
                                                    }
                                                }
                                                 else{
                                                    echo "<td><b><span class='badge bg-danger'' data-position='left center'>", $result_ar['Act_prediction'], "</span></b></td>";
//                                                     echo "<td>", $result_ar['Act_prediction'], "</td>";
                                                    if ($result_ar['Act_probability']==1){
                                                        echo "<td><b><span class='badge bg-danger' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['Act_probability'], "</span></b></td>";
                                                    }
                                                    else{
                                                        
                                                       // echo '<td><b><span class="badge bg-danger testtooltip" data-toggle="tooltip" data-html="true" data-container="body" data-placement="bottom" title="<table class=\'kpiTableHov\'><tr><th>Model</th><th>Prediction</th><th>Confidence</th></tr><tr><td>Des',$result_ar['ActDes_model'],'</td><td class=',getPredictionsColor($result_ar['ActDes_prediction']),'>',$result_ar['ActDes_prediction'],'</td><td class=',getPredictionsColor($result_ar['ActDes_prediction']),'>',$result_ar['ActDes_probability'],'</td></tr><tr><td>FP',$result_ar['ActFP_model'],'</td><td class=',getPredictionsColor($result_ar['ActFP_prediction']),'>',$result_ar['ActFP_prediction'],'</td><td class=',getPredictionsColor($result_ar['ActFP_prediction']),'>',$result_ar['ActFP_probability'],'</td></tr><tr><td>Topo',$result_ar['ActTopo_model'],'</td><td class=',getPredictionsColor($result_ar['Act_prediction']),'>',$result_ar['ActTopo_prediction'],'</td><td class=',getPredictionsColor($result_ar['ActTopo_prediction']),'>',$result_ar['ActTopo_probability'],'</td></tr></table>">',$result_ar['Act_probability'],'</td>';
                                                       hoverTable($result_ar['Act_prediction'],$result_ar['ActDes_model'],$result_ar['ActDes_prediction'],$result_ar['ActDes_probability'],$result_ar['ActFP_model'],$result_ar['ActFP_prediction'],$result_ar['ActFP_probability'],$result_ar['ActTopo_model'],$result_ar['ActTopo_prediction'],$result_ar['ActTopo_probability'],$result_ar['Act_probability']);
                                                    }

                                                 }

                                                 function getPredictionsColor($predictions){
                                                    if($predictions == "ACTIVE"){
                                                        echo 'hovertable-green-text';
                                                    }
                                                    else{
                                                        echo 'hovertable-red-text';
                                                    }
                                                 }

                                                 function hoverTable($whole_prediction,$model_des,$prediction_des,$probability_des,$model_fp,$prediction_fp,$probability_fp,$model_topo,$prediction_topo, $probability_topo, $probability_whole){
                                                     if($whole_prediction == "ACTIVE"){
                                                        echo '<td><b><span class="badge bg-success testtooltip" data-toggle="tooltip" data-html="true" data-container="body" data-placement="bottom" title="<table class=\'kpiTableHov\'><tr><th>Model</th><th>Prediction</th><th>Confidence</th></tr><tr><td>Des',$model_des,'</td><td class=',getPredictionsColor($prediction_des),'>',$prediction_des,'</td><td class=',getPredictionsColor($prediction_des),'>',$probability_des,'</td></tr><tr><td>FP',$model_fp,'</td><td class=',getPredictionsColor($prediction_fp),'>',$prediction_fp,'</td><td class=',getPredictionsColor($prediction_fp),'>',$probability_fp,'</td></tr><tr><td>Topo',$model_topo,'</td><td class=',getPredictionsColor($prediction_topo),'>',$prediction_topo,'</td><td class=',getPredictionsColor($prediction_topo),'>',$probability_topo,'</td></tr></table>">',$probability_whole,'</td>';
                                                      }
                                                     else{
                                                        echo '<td><b><span class="badge bg-danger testtooltip" data-toggle="tooltip" data-html="true" data-container="body" data-placement="bottom" title="<table class=\'kpiTableHov\'><tr><th>Model</th><th>Prediction</th><th>Confidence</th></tr><tr><td>Des',$model_des,'</td><td class=',getPredictionsColor($prediction_des),'>',$prediction_des,'</td><td class=',getPredictionsColor($prediction_des),'>',$probability_des,'</td></tr><tr><td>FP',$model_fp,'</td><td class=',getPredictionsColor($prediction_fp),'>',$prediction_fp,'</td><td class=',getPredictionsColor($prediction_fp),'>',$probability_fp,'</td></tr><tr><td>Topo',$model_topo,'</td><td class=',getPredictionsColor($prediction_topo),'>',$prediction_topo,'</td><td class=',getPredictionsColor($prediction_topo),'>',$probability_topo,'</td></tr></table>">',$probability_whole,'</td>';
                                                     }
                                                   
                                                 }
                                          ?>
                                        
                                         

                                    </tr>
                        

                                    <tr>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=15" target='_self' class="hover_color">SARS-CoV-2 cytopathic effect (host tox Counter) / Cytotoxicity</a></td>
                                          <?php
                                                 if ($result_ar['Tox_prediction'] == "ACTIVE"){
                                                     //echo "<td><b><span class='badge bg-success' data-position='left center'>", "</span></b></td>";
                                                     echo "<td><b><span class='badge bg-success'' data-position='left center'>", $result_ar['Tox_prediction'], "</span></b></td>";

                                                     if ($result_ar['Tox_probability'] == 1){
                                                        echo "<td><b><span class='badge bg-success' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['Tox_probability'], "</span></b></td>";
                                                    }
                                                   
                                                    else{
                                                        hoverTable($result_ar['Tox_prediction'],$result_ar['ToxDes_model'],$result_ar['ToxDes_prediction'],$result_ar['ToxDes_probability'],$result_ar['ToxFP_model'],$result_ar['ToxFP_prediction'],$result_ar['ToxFP_probability'],$result_ar['ToxTopo_model'],$result_ar['ToxTopo_prediction'],$result_ar['ToxTopo_probability'],$result_ar['Tox_probability']);
                                                    }
                                                 }
                                                 else{
                                                    echo "<td><b><span class='badge bg-danger'' data-position='left center'>", $result_ar['Tox_prediction'], "</span></b></td>";

                                                    if ($result_ar['Tox_probability']==1){
                                                        echo "<td><b><span class='badge bg-danger' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['Tox_probability'], "</span></b></td>";
                                                    }
                                                    else{
                            
                                                        hoverTable($result_ar['Tox_prediction'],$result_ar['ToxDes_model'],$result_ar['ToxDes_prediction'],$result_ar['ToxDes_probability'],$result_ar['ToxFP_model'],$result_ar['ToxFP_prediction'],$result_ar['ToxFP_probability'],$result_ar['ToxTopo_model'],$result_ar['ToxTopo_prediction'],$result_ar['ToxTopo_probability'],$result_ar['Tox_probability']);
                                                    }
                                                 }

                                                 
                                                 
                                          ?>
                                    </tr>

                                    <tr>
                                      <td rowspan="3" class="center aligned"><h3>Viral Entry</h3></td>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=1" target='_self' class="hover_color">Spike-ACE2 protein-protein interaction (AlphaLISA)</a></td>
                                          <?php
                                                 if ($result_ar['AlphaLisa_prediction'] == "ACTIVE"){
                                                     echo "<td><b><span class='badge bg-success' ' data-position='left center'>", $result_ar['AlphaLisa_prediction'], "</span></b></td>";
                                                    
                                                     if ($result_ar['AlphaLisa_probability'] == 1){
                                                        echo "<td><b><span class='badge bg-success' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['AlphaLisa_probability'], "</span></b></td>";
                                                    }

                                                    else{
                                                        hoverTable($result_ar['AlphaLisa_prediction'],$result_ar['AlphaLisaDes_model'],$result_ar['AlphaLisaDes_prediction'],$result_ar['AlphaLisaDes_probability'],$result_ar['AlphaLisaFP_model'],$result_ar['AlphaLisaFP_prediction'],$result_ar['AlphaLisaFP_probability'],$result_ar['AlphaLisaTopo_model'],$result_ar['AlphaLisaTopo_prediction'],$result_ar['AlphaLisaTopo_probability'],$result_ar['AlphaLisa_probability']);
                                                    }

                                                }
                                                 else{
                                                    echo "<td><b><span class='badge bg-danger' ' data-position='left center'>", $result_ar['AlphaLisa_prediction'], "</span></b></td>";

                                                    if ($result_ar['AlphaLisa_probability']==1){
                                                        echo "<td><b><span class='badge bg-danger' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['AlphaLisa_probability'], "</span></b></td>";
                                                    }
                                                    else{
                                                        hoverTable($result_ar['AlphaLisa_prediction'],$result_ar['AlphaLisaDes_model'],$result_ar['AlphaLisaDes_prediction'],$result_ar['AlphaLisaDes_probability'],$result_ar['AlphaLisaFP_model'],$result_ar['AlphaLisaFP_prediction'],$result_ar['AlphaLisaFP_probability'],$result_ar['AlphaLisaTopo_model'],$result_ar['AlphaLisaTopo_prediction'],$result_ar['AlphaLisaTopo_probability'],$result_ar['AlphaLisa_probability']);
                                                    }
                                                 }
//                                                    
                                          ?>
                                    </tr>

                                    <tr>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=2" target='_self' class="hover_color">Spike-ACE2 protein-protein interaction (TruHit Counter)</a></td>
                                          <?php
                                                 if ($result_ar['TruHit_prediction'] == "ACTIVE"){
                                                     echo "<td><b><span class='badge bg-success' ' data-position='left center'>", $result_ar['TruHit_prediction'], "</span></b></td>";
                                                     if ($result_ar['TruHit_probability']==1){
                                                        echo "<td><b><span class='badge bg-success' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['TruHit_probability'], "</span></b></td>";
                                                    }

                                                    else{
                                                        hoverTable($result_ar['TruHit_prediction'],$result_ar['TruHitDes_model'],$result_ar['TruHitDes_prediction'],$result_ar['TruHitDes_probability'],$result_ar['TruHitFP_model'],$result_ar['TruHitFP_prediction'],$result_ar['TruHitFP_probability'],$result_ar['TruHitTopo_model'],$result_ar['TruHitTopo_prediction'],$result_ar['TruHitTopo_probability'],$result_ar['TruHit_probability']);
                                                       
                                                    }
                                                 }
                                                     else{
                                                    echo "<td><b><span class='badge bg-danger' ' data-position='left center'>", $result_ar['TruHit_prediction'], "</span></b></td>";
                                                    if ($result_ar['TruHit_probability']==1){
                                                        echo "<td><b><span class='badge bg-danger' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['TruHit_probability'], "</span></b></td>";
                                                    }
                                                    else{
                                                        hoverTable($result_ar['TruHit_prediction'],$result_ar['TruHitDes_model'],$result_ar['TruHitDes_prediction'],$result_ar['TruHitDes_probability'],$result_ar['TruHitFP_model'],$result_ar['TruHitFP_prediction'],$result_ar['TruHitFP_probability'],$result_ar['TruHitTopo_model'],$result_ar['TruHitTopo_prediction'],$result_ar['TruHitTopo_probability'],$result_ar['TruHit_probability']);
                                                    }   
                                                }

                                                
                                          ?>
                                    </tr>

                                    <tr>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=6" target='_self' class="hover_color">ACE2 enzymatic activity</a></td>
                                          <?php
                                                 if ($result_ar['ACE2Enzymatic_prediction'] == "ACTIVE"){
                                                     echo "<td><b><span class='badge bg-success' ' data-position='left center'>", $result_ar['ACE2Enzymatic_prediction'], "</span></b></td>";
                                                     
                                                     if ($result_ar['ACE2Enzymatic_probability']==1){
                                                        echo "<td><b><span class='badge bg-success' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['ACE2Enzymatic_probability'], "</span></b></td>";
                                                    }

                                                    else{
                                                        hoverTable($result_ar['ACE2Enzymatic_prediction'],$result_ar['ACE2EnzymaticDes_model'],$result_ar['ACE2EnzymaticDes_prediction'],$result_ar['ACE2EnzymaticDes_probability'],$result_ar['ACE2EnzymaticFP_model'],$result_ar['ACE2EnzymaticFP_prediction'],$result_ar['ACE2EnzymaticFP_probability'],$result_ar['ACE2EnzymaticTopo_model'],$result_ar['ACE2EnzymaticTopo_prediction'],$result_ar['ACE2EnzymaticTopo_probability'],$result_ar['ACE2Enzymatic_probability']);
                                                    }
                                                }
                                                 else{
                                                    echo "<td><b><span class='badge bg-danger' ' data-position='left center'>", $result_ar['ACE2Enzymatic_prediction'], "</span></b></td>";
                                                    if ($result_ar['ACE2Enzymatic_probability']==1){
                                                        echo "<td><b><span class='badge bg-danger' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['ACE2Enzymatic_probability'], "</span></b></td>";
                                                    }
                                                    else{
                                                        hoverTable($result_ar['ACE2Enzymatic_prediction'],$result_ar['ACE2EnzymaticDes_model'],$result_ar['ACE2EnzymaticDes_prediction'],$result_ar['ACE2EnzymaticDes_probability'],$result_ar['ACE2EnzymaticFP_model'],$result_ar['ACE2EnzymaticFP_prediction'],$result_ar['ACE2EnzymaticFP_probability'],$result_ar['ACE2EnzymaticTopo_model'],$result_ar['ACE2EnzymaticTopo_prediction'],$result_ar['ACE2EnzymaticTopo_probability'],$result_ar['ACE2Enzymatic_probability']);
                                                    } 
                                                 }
                                                 
                                          ?>
                                    </tr>

                                    <tr>
                                      <td rowspan="1" class="center aligned"><h3>Viral Replication</h3></td>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=9" target='_self' class="hover_color">3CL enzymatic activity</a></td>
                                          <?php
                                                 if ($result_ar['3CLEnzymatic_prediction'] == "ACTIVE"){
                                                     echo "<td><b><span class='badge bg-success' ' data-position='left center'>", $result_ar['3CLEnzymatic_prediction'], "</span></b></td>";

                                                     if ($result_ar['3CLEnzymatic_probability']==1){
                                                        echo "<td><b><span class='badge bg-success' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['3CLEnzymatic_probability'], "</span></b></td>";
                                                    }

                                                    else{
                                                        hoverTable($result_ar['3CLEnzymatic_prediction'],$result_ar['3CLEnzymaticDes_model'],$result_ar['3CLEnzymaticDes_prediction'],$result_ar['3CLEnzymaticDes_probability'],$result_ar['3CLEnzymaticFP_model'],$result_ar['3CLEnzymaticFP_prediction'],$result_ar['3CLEnzymaticFP_probability'],$result_ar['3CLEnzymaticTopo_model'],$result_ar['3CLEnzymaticTopo_prediction'],$result_ar['3CLEnzymaticTopo_probability'],$result_ar['3CLEnzymatic_probability']);
                                                    }
                                                 }
                                                else{

                                                    echo "<td><b><span class='badge bg-danger' ' data-position='left center'>", $result_ar['3CLEnzymatic_prediction'], "</span></b></td>";

                                                    if ($result_ar['3CLEnzymatic_probability']==1){
                                                        echo "<td><b><span class='badge bg-danger' data-tooltip='Experimentally Validaded' data-position='left center'>", $result_ar['3CLEnzymatic_probability'], "</span></b></td>";
                                                    }
                                                    else{
                                                        hoverTable($result_ar['3CLEnzymatic_prediction'],$result_ar['3CLEnzymaticDes_model'],$result_ar['3CLEnzymaticDes_prediction'],$result_ar['3CLEnzymaticDes_probability'],$result_ar['3CLEnzymaticFP_model'],$result_ar['3CLEnzymaticFP_prediction'],$result_ar['3CLEnzymaticFP_probability'],$result_ar['3CLEnzymaticTopo_model'],$result_ar['3CLEnzymaticTopo_prediction'],$result_ar['3CLEnzymaticTopo_probability'],$result_ar['3CLEnzymatic_probability']);
                                                    }
                                                }
                                               
                                          ?>
                                    </tr>

                                    <tr>
                                      <td rowspan="4" class="center aligned"><h3>In vitro Infectivity</h3></td>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=22" target='_self' class="hover_color">SARS-CoV pseudotyped particle entry (CoV-PPE)</a></td>
                                          <?php
                                                 if ($result_ar['CoVPPE_prediction'] == "ACTIVE"){
                                                    echo "<td><b><span class='badge bg-success'  ' data-position='left center'>", $result_ar['CoVPPE_prediction'], "</span></b></td>";
                                                    if ($result_ar['CoVPPE_probability']==1){
                                                        echo "<td><b><span class='badge bg-success' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['CoVPPE_probability'], "</span></b></td>";
                                                    }

                                                    else{
                                                        hoverTable($result_ar['CoVPPE_prediction'],$result_ar['CoVPPEDes_model'],$result_ar['CoVPPEDes_prediction'],$result_ar['CoVPPEDes_probability'],$result_ar['CoVPPEFP_model'],$result_ar['CoVPPEFP_prediction'],$result_ar['CoVPPEFP_probability'],$result_ar['CoVPPETopo_model'],$result_ar['CoVPPETopo_prediction'],$result_ar['CoVPPETopo_probability'],$result_ar['CoVPPE_probability']);
                                                    }
                                                 }
                                                     else{
                                                     echo "<td><b><span class='badge bg-danger' ' data-position='left center'>", $result_ar['CoVPPE_prediction'], "</span></b></td>";
                                                     if ($result_ar['CoVPPE_probability']==1){
                                                        echo "<td><b><span class='badge bg-danger' data-tooltip='Experimentally Validaded' data-position='left center'>", $result_ar['CoVPPE_probability'], "</span></b></td>";
                                                    }
                                                    else{
                                                        hoverTable($result_ar['CoVPPE_prediction'],$result_ar['CoVPPEDes_model'],$result_ar['CoVPPEDes_prediction'],$result_ar['CoVPPEDes_probability'],$result_ar['CoVPPEFP_model'],$result_ar['CoVPPEFP_prediction'],$result_ar['CoVPPEFP_probability'],$result_ar['CoVPPETopo_model'],$result_ar['CoVPPETopo_prediction'],$result_ar['CoVPPETopo_probability'],$result_ar['CoVPPE_probability']);
                                                    }
                                                }
                                                
                                          ?>
                                    </tr>

                                    <tr>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=23" target='_self' class="hover_color">SARS-CoV pseudotyped particle entry counter screen (CoV-PPE_cs)</a></td>
                                          <?php
                                                 if ($result_ar['CoVPPEcs_prediction'] == "ACTIVE"){
                                                     echo "<td><b><span class='badge bg-success' ' data-position='left center'>", $result_ar['CoVPPEcs_prediction'], "</span></b></td>";
                                                     
                                                     if ($result_ar['CoVPPEcs_probability']==1){
                                                        echo "<td><b><span class='badge bg-success' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['CoVPPEcs_probability'], "</span></b></td>";
                                                    }

                                                    else{
                                                        hoverTable($result_ar['CoVPPEcs_prediction'],$result_ar['CoVPPEcsDes_model'],$result_ar['CoVPPEcsDes_prediction'],$result_ar['CoVPPEcsDes_probability'],$result_ar['CoVPPEcsFP_model'],$result_ar['CoVPPEcsFP_prediction'],$result_ar['CoVPPEcsFP_probability'],$result_ar['CoVPPEcsTopo_model'],$result_ar['CoVPPEcsTopo_prediction'],$result_ar['CoVPPEcsTopo_probability'],$result_ar['CoVPPEcs_probability']);
                                                    }

                                                    }
                                                 else {
                                                    echo "<td><b><span class='badge bg-danger' ' data-position='left center'>", $result_ar['CoVPPEcs_prediction'], "</span></b></td>";
                                                    if ($result_ar['CoVPPEcs_probability']==1){
                                                        echo "<td><b><span class='badge bg-danger' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['CoVPPEcs_probability'], "</span></b></td>";
                                                    }
                                                    else{
                                                        hoverTable($result_ar['CoVPPEcs_prediction'],$result_ar['CoVPPEcsDes_model'],$result_ar['CoVPPEcsDes_prediction'],$result_ar['CoVPPEcsDes_probability'],$result_ar['CoVPPEcsFP_model'],$result_ar['CoVPPEcsFP_prediction'],$result_ar['CoVPPEcsFP_probability'],$result_ar['CoVPPEcsTopo_model'],$result_ar['CoVPPEcsTopo_prediction'],$result_ar['CoVPPEcsTopo_probability'],$result_ar['CoVPPEcs_probability']);
                                                    }
                                                 }
                                                 
                                          ?>
                                    </tr>

                                    <tr>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=24" target='_self' class="hover_color">MERS-CoV pseudotyped particle entry (MERS-PPE)</a></td>
                                          <?php
                                                 if ($result_ar['MERSPPE_prediction'] == "ACTIVE"){
                                                 
                                                     echo "<td><b><span class='badge bg-success' ' data-position='left center'>", $result_ar['MERSPPE_prediction'], "</span></b></td>";
                                                    
                                                     if ($result_ar['MERSPPE_probability']==1){
                                                        echo "<td><b><span class='badge bg-success' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['MERSPPE_probability'], "</span></b></td>";
                                                    }

                                                    else{
                                                        hoverTable($result_ar['MERSPPE_prediction'],$result_ar['MERSPPEDes_model'],$result_ar['MERSPPEDes_prediction'],$result_ar['MERSPPEDes_probability'],$result_ar['MERSPPEFP_model'],$result_ar['MERSPPEFP_prediction'],$result_ar['MERSPPEFP_probability'],$result_ar['MERSPPETopo_model'],$result_ar['MERSPPETopo_prediction'],$result_ar['MERSPPETopo_probability'],$result_ar['MERSPPE_probability']);
                                                    }
                                                }
                                                     else{
                                                    
                                                    echo "<td><b><span class='badge bg-danger' ' data-position='left center'>", $result_ar['MERSPPE_prediction'], "</span></b></td>";
                                                    
                                                    if ($result_ar['MERSPPE_probability']==1){
                                                        echo "<td><b><span class='badge bg-danger' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['MERSPPE_probability'], "</span></b></td>";
                                                    }
                                                    else{
                                                        hoverTable($result_ar['MERSPPE_prediction'],$result_ar['MERSPPEDes_model'],$result_ar['MERSPPEDes_prediction'],$result_ar['MERSPPEDes_probability'],$result_ar['MERSPPEFP_model'],$result_ar['MERSPPEFP_prediction'],$result_ar['MERSPPEFP_probability'],$result_ar['MERSPPETopo_model'],$result_ar['MERSPPETopo_prediction'],$result_ar['MERSPPETopo_probability'],$result_ar['MERSPPE_probability']);
                                                    }

                                                }
                                                
                                          ?>
                                    </tr>

                                    <tr>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=25" target='_self' class="hover_color">MERS-CoV pseudotyped particle entry counter screen (MERS-PPE_cs)</a></td>
                                          <?php
                                                 if ($result_ar['MERSPPEcs_prediction'] == "ACTIVE"){
                                                     echo "<td><b><span class='badge bg-success' ' data-position='left center'>", $result_ar['MERSPPEcs_prediction'], "</span></b></td>";
                                                     if ($result_ar['MERSPPEcs_probability']==1){
                                                        echo "<td><b><span class='badge bg-succes' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['MERSPPEcs_probability'], "</span></b></td>";
                                                    }

                                                    else{
                                                        hoverTable($result_ar['MERSPPEcs_prediction'],$result_ar['MERSPPEcsDes_model'],$result_ar['MERSPPEcsDes_prediction'],$result_ar['MERSPPEcsDes_probability'],$result_ar['MERSPPEcsFP_model'],$result_ar['MERSPPEcsFP_prediction'],$result_ar['MERSPPEcsFP_probability'],$result_ar['MERSPPEcsTopo_model'],$result_ar['MERSPPEcsTopo_prediction'],$result_ar['MERSPPEcsTopo_probability'],$result_ar['MERSPPEcs_probability']);
                                                    }

                                                 }
                                                 else{
                                                    echo "<td><b><span class='badge bg-danger' ' data-position='left center'>", $result_ar['MERSPPEcs_prediction'], "</span></b></td>";
                                                    
                                                    if ($result_ar['MERSPPEcs_probability']==1){
                                                        echo "<td><b><span class='badge bg-danger' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['MERSPPEcs_probability'], "</span></b></td>";
                                                    }
                                                    else{
                                                        hoverTable($result_ar['MERSPPEcs_prediction'],$result_ar['MERSPPEcsDes_model'],$result_ar['MERSPPEcsDes_prediction'],$result_ar['MERSPPEcsDes_probability'],$result_ar['MERSPPEcsFP_model'],$result_ar['MERSPPEcsFP_prediction'],$result_ar['MERSPPEcsFP_probability'],$result_ar['MERSPPEcsTopo_model'],$result_ar['MERSPPEcsTopo_prediction'],$result_ar['MERSPPEcsTopo_probability'],$result_ar['MERSPPEcs_probability']);
                                                    }
                                                 }
                                                 
                                          ?>
                                    </tr>

                                    <tr>
                                      <td rowspan="1" class="center aligned"><h3>Human Cell Toxicity</h3></td>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=21" target='_self' class="hover_color">Human fibroblast toxicity (hCYTOX)</a></td>
                                          <?php
                                                 if ($result_ar['hCYTOX_prediction'] == "ACTIVE"){
                                                     echo "<td><b><span class='badge bg-success' ' data-position='left center'>", $result_ar['hCYTOX_prediction'], "</span></b></td>";
                                                     if ($result_ar['hCYTOX_probability']==1){
                                                        echo "<td><b><span class='badge bg-success' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['hCYTOX_probability'], "</span></b></td>";
                                                    }

                                                    else{
                                                        hoverTable($result_ar['hCYTOX_prediction'],$result_ar['hCYTOXDes_model'],$result_ar['hCYTOXDes_prediction'],$result_ar['hCYTOXDes_probability'],$result_ar['hCYTOXFP_model'],$result_ar['hCYTOXFP_prediction'],$result_ar['hCYTOXFP_probability'],$result_ar['hCYTOXTopo_model'],$result_ar['hCYTOXTopo_prediction'],$result_ar['hCYTOXTopo_probability'],$result_ar['hCYTOX_probability']);
                                                    }

                                                 }
                                                 else{
                                                    echo "<td><b><span class='badge bg-danger' ' data-position='left center'>", $result_ar['hCYTOX_prediction'], "</span></b></td>";
                                                    
                                                    if ($result_ar['hCYTOX_probability']==1){
                                                        echo "<td><b><span class='badge bg-danger' data-tooltip='Experimentally Validated' data-position='left center'>", $result_ar['hCYTOX_probability'], "</span></b></td>";
                                                    }
                                                    else{
                                                        hoverTable($result_ar['hCYTOX_prediction'],$result_ar['hCYTOXDes_model'],$result_ar['hCYTOXDes_prediction'],$result_ar['hCYTOXDes_probability'],$result_ar['hCYTOXFP_model'],$result_ar['hCYTOXFP_prediction'],$result_ar['hCYTOXFP_probability'],$result_ar['hCYTOXTopo_model'],$result_ar['hCYTOXTopo_prediction'],$result_ar['hCYTOXTopo_probability'],$result_ar['hCYTOX_probability']);
                                                    }

                                                 }
                                                 
                                          ?>
                                    </tr>
                                    
                              </tbody>

                        </table>
                    </div>

                <h4 style="text-align: left;">Promising drugs are those that:</h4>
                    <p align="left" style="font-size:12px;">
                        <b><li> Are active in CPE and are inactive in cytotox</li> AND
                        <b><li> Are inactive in ACE2</li> AND
                        <b><li> Are active in 3CL</li>
                        AND/OR
                        <b><li>Are active in at least one of the following: AlphaLISA, CoV-PPE, MERS-PPE. While they are inactive in the counter screen, respectively: TruHit, CoV-PPE_cs, MERS-PPE_cs</li> AND
                        <b><li>Are inactive in hCYTOX</li>
                    </p>

            </div>

        <div class="well">
            <h3> Similarity Results With various <a href="https://opendata.ncats.nih.gov/covid19/" target='_self' class="hover_color">SARS-CoV-2 Assays</a> </h3>
                <div class="container__table">

                    <table class="ui selectable celled table" border="0" cellpadding="0" cellspacing="0">

                        <thead>
                             <tr>
                             <!-- <th class="three wide">Processed Reference SMILES</th> For fixing column width -->
                                    <th class="three wide">Processed Reference SMILES</th>
                                   <th>Sample Name</th>
                                   <th>CPE</th>
                                   <th>Cytotoxicity</th>
                                   <th>AlphaLISA</th>
                                   <th>TruHit_Counterscreen</th>
                                   <th>ACE2</th>
                                   <th>3CL</th>
                                   <th>CoV-PPE</th>
                                   <th>CoV-PPE_cs</th>
                                   <th>MERS-PPE</th>
                                   <th>MERS-PPE_cs</th>
                                   <th>hCYTOX</th>
                                    <th>Tanimoto Similarity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php



                            foreach ($result_ar['similarity_results'] as $k2 => $v2) {

//                               foreach ($v as $k2 => $v2) {

                                echo "<tr>
                                <td>", $k2,  "</td>";
                                echo "<td>", $v2['sample_name_combined'], "</td>";
//                                 echo "<td>", $v2['NCATS.SYNONYMS'], "</td>";
                                echo "<td>", $v2['CPE.ACTIVITY_CLASS'], "</td>";
                                echo "<td>", $v2['host_tox_counterscreen.ACTIVITY_CLASS'], "</td>";
                                echo "<td>", $v2['AlphaLISA.ACTIVITY_CLASS'], "</td>";
                                echo "<td>", $v2['TruHit_Counterscreen.ACTIVITY_CLASS'], "</td>";
                                echo "<td>", $v2['ACE2_enzymatic_activity.ACTIVITY_CLASS'], "</td>";
                                echo "<td>", $v2['3CL.ACTIVITY_CLASS'], "</td>";
                                echo "<td>", $v2['CoV1-PPE.ACTIVITY_CLASS'], "</td>";
                                echo "<td>", $v2['CoV1-PPE_cs.ACTIVITY_CLASS'], "</td>";
                                echo "<td>", $v2['MERS-PPE.ACTIVITY_CLASS'], "</td>";
                                echo "<td>", $v2['MERS-PPE_cs.ACTIVITY_CLASS'], "</td>";
                                echo "<td>", $v2['hCYTOX.ACTIVITY_CLASS'], "</td>";
                                echo "<td>", $v2['tanimoto'], "</td>";
                                "</tr>";

//                               }

                            }

                            ?>

                        </tbody>
                    </table>

                </div>

               <!-- Add one line about confidence, prediction, class -->
               <!--     <div class="ui segment">
                        <div class="ui container left aligned">
                            <p>
                                1. ACTIVE MEANS (TO_BE_ADDED)<br/>
                                2. TOXIC MEANS (TO_BE_ADDED)
                            </p>
                        </div>
                    </div> -->

        </div>
        

        <div class="ui segment">
            <div class="ui container center aligned">
                    <div class="ui medium images">
                      <img class="ui image" src="static/images/utep-logo.png" style="width:450px;height:100px;margin-right:20px;margin-top:50px;">
                      <img class="ui image" src="static/images/UNMTID_Logo.png">
                    </div>
                <h3>
                    In Collaboration with <a href="http://www.sirimullaresearchgroup.com/" target='_self' class="hover_color">Sirimulla Research Group​</a>
                     <!-- <img class="ui mini left spaced image" src="static/images/utep-pharmacy_orig.png"> -->
                </h3>
            </div>
        </div>

<script>
    //This is for the behavior of the hoving table
    $('.testtooltip').tooltip({
      sanitize: false,
      template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner large"></div></div>'
    }).tooltip("option", "show.delay", 500)
</script>

<!--         </div>

    </div> -->


<!-- </div> -->
