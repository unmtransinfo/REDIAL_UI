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

</style>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

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
                                    </tr>

                              </thead>

                              <tbody>

                                    <tr>
                                      <td rowspan="2" class="center aligned activating element"><h3>Live Virus Infectivity</h3></td>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=14" target='_self' class="hover_color">SARS-CoV-2 cytopathic effect (CPE)</a></td>
                                          <?php
                                                 if ($result_ar['Act_prediction'] == "ACTIVE")
									 	            echo "<td><b><span class='badge bg-success' data-tooltip='Confidence: ", $result_ar['Act_probability'], "' data-position='left center'>", $result_ar['Act_prediction'], "</span></b></td>";
                                                 else
                                                    echo "<td><b><span class='badge bg-danger' data-tooltip='Confidence: ", $result_ar['Act_probability'], "' data-position='left center'>", $result_ar['Act_prediction'], "</span></b></td>";
//                                                     echo "<td>", $result_ar['Act_prediction'], "</td>";
                                          ?>
                                    </tr>

                                    <tr>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=15" target='_self' class="hover_color">SARS-CoV-2 cytopathic effect (host tox Counter) / Cytotoxicity</a></td>
                                          <?php
                                                 if ($result_ar['Tox_prediction'] == "ACTIVE")
									 	            echo "<td><b><span class='badge bg-success' data-tooltip='Confidence: ", $result_ar['Tox_probability'], "' data-position='left center'>", $result_ar['Tox_prediction'], "</span></b></td>";
                                                 else
                                                    echo "<td><b><span class='badge bg-danger' data-tooltip='Confidence: ", $result_ar['Tox_probability'], "' data-position='left center'>", $result_ar['Tox_prediction'], "</span></b></td>";
//                                                     echo "<td>", $result_ar['Tox_prediction'], "</td>";
                                          ?>
                                    </tr>

                                    <tr>
                                      <td rowspan="3" class="center aligned"><h3>Viral Entry</h3></td>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=1" target='_self' class="hover_color">Spike-ACE2 protein-protein interaction (AlphaLISA)</a></td>
                                          <?php
                                                 if ($result_ar['AlphaLisa_prediction'] == "ACTIVE")
									 	            echo "<td><b><span class='badge bg-success' data-tooltip='Confidence: ", $result_ar['AlphaLisa_probability'], "' data-position='left center'>", $result_ar['AlphaLisa_prediction'], "</span></b></td>";
                                                 else
                                                    echo "<td><b><span class='badge bg-danger' data-tooltip='Confidence: ", $result_ar['AlphaLisa_probability'], "' data-position='left center'>", $result_ar['AlphaLisa_prediction'], "</span></b></td>";
//                                                     echo "<td>", $result_ar['AlphaLisa_prediction'], "</td>";
                                          ?>
                                    </tr>

                                    <tr>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=2" target='_self' class="hover_color">Spike-ACE2 protein-protein interaction (TruHit Counter)</a></td>
                                          <?php
                                                 if ($result_ar['TruHit_prediction'] == "ACTIVE")
									 	            echo "<td><b><span class='badge bg-success' data-tooltip='Confidence: ", $result_ar['TruHit_probability'], "' data-position='left center'>", $result_ar['TruHit_prediction'], "</span></b></td>";
                                                 else
                                                    echo "<td><b><span class='badge bg-danger' data-tooltip='Confidence: ", $result_ar['TruHit_probability'], "' data-position='left center'>", $result_ar['TruHit_prediction'], "</span></b></td>";
//                                                     echo "<td>", $result_ar['TruHit_prediction'], "</td>";
                                          ?>
                                    </tr>

                                    <tr>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=6" target='_self' class="hover_color">ACE2 enzymatic activity</a></td>
                                          <?php
                                                 if ($result_ar['ACE2Enzymatic_prediction'] == "ACTIVE")
									 	            echo "<td><b><span class='badge bg-success' data-tooltip='Confidence: ", $result_ar['ACE2Enzymatic_probability'], "' data-position='left center'>", $result_ar['ACE2Enzymatic_prediction'], "</span></b></td>";
                                                 else
                                                    echo "<td><b><span class='badge bg-danger' data-tooltip='Confidence: ", $result_ar['ACE2Enzymatic_probability'], "' data-position='left center'>", $result_ar['ACE2Enzymatic_prediction'], "</span></b></td>";
//                                                     echo "<td>", $result_ar['ACE2Enzymatic_prediction'], "</td>";
                                          ?>
                                    </tr>

                                    <tr>
                                      <td rowspan="1" class="center aligned"><h3>Viral Replication</h3></td>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=9" target='_self' class="hover_color">3CL enzymatic activity</a></td>
                                          <?php
                                                 if ($result_ar['3CLEnzymatic_prediction'] == "ACTIVE")
									 	            echo "<td><b><span class='badge bg-success' data-tooltip='Confidence: ", $result_ar['3CLEnzymatic_probability'], "' data-position='left center'>", $result_ar['3CLEnzymatic_prediction'], "</span></b></td>";
                                                 else
                                                    echo "<td><b><span class='badge bg-danger' data-tooltip='Confidence: ", $result_ar['3CLEnzymatic_probability'], "' data-position='left center'>", $result_ar['3CLEnzymatic_prediction'], "</span></b></td>";
//                                                     echo "<td>", $result_ar['AlphaLisa_prediction'], "</td>";
                                          ?>
                                    </tr>

                                    <tr>
                                      <td rowspan="4" class="center aligned"><h3>In vitro Infectivity</h3></td>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=22" target='_self' class="hover_color">SARS-CoV pseudotyped particle entry (CoV-PPE)</a></td>
                                          <?php
                                                 if ($result_ar['CoVPPE_prediction'] == "ACTIVE")
									 	            echo "<td><b><span class='badge bg-success' data-tooltip='Confidence: ", $result_ar['CoVPPE_probability'], "' data-position='left center'>", $result_ar['CoVPPE_prediction'], "</span></b></td>";
                                                 else
                                                    echo "<td><b><span class='badge bg-danger' data-tooltip='Confidence: ", $result_ar['CoVPPE_probability'], "' data-position='left center'>", $result_ar['CoVPPE_prediction'], "</span></b></td>";
//                                                     echo "<td>", $result_ar['AlphaLisa_prediction'], "</td>";
                                          ?>
                                    </tr>

                                    <tr>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=23" target='_self' class="hover_color">SARS-CoV pseudotyped particle entry counter screen (CoV-PPE_cs)</a></td>
                                          <?php
                                                 if ($result_ar['CoVPPEcs_prediction'] == "ACTIVE")
									 	            echo "<td><b><span class='badge bg-success' data-tooltip='Confidence: ", $result_ar['CoVPPEcs_probability'], "' data-position='left center'>", $result_ar['CoVPPEcs_prediction'], "</span></b></td>";
                                                 else
                                                    echo "<td><b><span class='badge bg-danger' data-tooltip='Confidence: ", $result_ar['CoVPPEcs_probability'], "' data-position='left center'>", $result_ar['CoVPPEcs_prediction'], "</span></b></td>";
//                                                     echo "<td>", $result_ar['AlphaLisa_prediction'], "</td>";
                                          ?>
                                    </tr>

                                    <tr>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=24" target='_self' class="hover_color">MERS-CoV pseudotyped particle entry (MERS-PPE)</a></td>
                                          <?php
                                                 if ($result_ar['MERSPPE_prediction'] == "ACTIVE")
									 	            echo "<td><b><span class='badge bg-success' data-tooltip='Confidence: ", $result_ar['MERSPPE_probability'], "' data-position='left center'>", $result_ar['MERSPPE_prediction'], "</span></b></td>";
                                                 else
                                                    echo "<td><b><span class='badge bg-danger' data-tooltip='Confidence: ", $result_ar['MERSPPE_probability'], "' data-position='left center'>", $result_ar['MERSPPE_prediction'], "</span></b></td>";
//                                                     echo "<td>", $result_ar['AlphaLisa_prediction'], "</td>";
                                          ?>
                                    </tr>

                                    <tr>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=25" target='_self' class="hover_color">MERS-CoV pseudotyped particle entry counter screen (MERS-PPE_cs)</a></td>
                                          <?php
                                                 if ($result_ar['MERSPPEcs_prediction'] == "ACTIVE")
									 	            echo "<td><b><span class='badge bg-success' data-tooltip='Confidence: ", $result_ar['MERSPPEcs_probability'], "' data-position='left center'>", $result_ar['MERSPPEcs_prediction'], "</span></b></td>";
                                                 else
                                                    echo "<td><b><span class='badge bg-danger' data-tooltip='Confidence: ", $result_ar['MERSPPEcs_probability'], "' data-position='left center'>", $result_ar['MERSPPEcs_prediction'], "</span></b></td>";
//                                                     echo "<td>", $result_ar['AlphaLisa_prediction'], "</td>";
                                          ?>
                                    </tr>

                                    <tr>
                                      <td rowspan="1" class="center aligned"><h3>Human Cell Toxicity</h3></td>
                                      <td><a href="https://opendata.ncats.nih.gov/covid19/assay?aid=21" target='_self' class="hover_color">Human fibroblast toxicity (hCYTOX)</a></td>
                                          <?php
                                                 if ($result_ar['hCYTOX_prediction'] == "ACTIVE")
									 	            echo "<td><b><span class='badge bg-success' data-tooltip='Confidence: ", $result_ar['hCYTOX_probability'], "' data-position='left center'>", $result_ar['hCYTOX_prediction'], "</span></b></td>";
                                                 else
                                                    echo "<td><b><span class='badge bg-danger' data-tooltip='Confidence: ", $result_ar['hCYTOX_probability'], "' data-position='left center'>", $result_ar['hCYTOX_prediction'], "</span></b></td>";
//                                                     echo "<td>", $result_ar['AlphaLisa_prediction'], "</td>";
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


        <div class="well">

            <h3> Similarity Results With <a href="https://opendata.ncats.nih.gov/covid19/assay?aid=9" target='_self' class="hover_color">3CL Activity Dataset</a> </h3>
                <div class="container__table">

                    <table class="ui selectable celled table" border="0" cellpadding="0" cellspacing="0">

                        <thead>
                             <tr>
                             <!-- <th class="three wide">Processed Reference SMILES</th> For fixing column width -->
                                    <th class="three wide">Processed Reference SMILES</th>
                                   <th>Sample Name</th>
                                   <th>3CL</th>
                                    <th>Tanimoto Similarity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            foreach ($result_ar['three_cl_similarity_results'] as $k2 => $v2) {

                                echo "<tr>
                                <td>", $k2,  "</td>";
                                echo "<td>", $v2['SAMPLE_NAME'], "</td>";
                                echo "<td>", $v2['3CL_enzymatic_activity.ACTIVITY_CLASS'], "</td>";
                                echo "<td>", $v2['tanimoto'], "</td>";
                                "</tr>";

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

                 <!-- Go back to previous page
                    <form>
                        <input type="button" class="btn btn-inverse" value="Back" onclick="history.go(-1);return true;">
                        <button class="btn btn-inverse" onclick="window.close()">Back</button>
                    </form>
                 -->
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



<!--         </div>

    </div> -->


<!-- </div> -->
