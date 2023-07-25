<style>

h3 {text-align: center;}

</style>



<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

<div class="ui segment">
    <div class="ui container center aligned">
        <h2>Theory- How to interpret the results</h2>
    </div>
</div>

<style type="text/css">

    td.dreta {
    text-align: right;
    }

    .wrapper {width: auto; height: auto; overflow: auto;}

</style>

        <link href="vendor/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="vendor/owl_carousel2/css/owl.carousel.min.css">
        <link rel="stylesheet" href="vendor/owl_carousel2/css/owl.theme.default.min.css">

<div class="ui segment">
<!--
          <div class="wrapper">


                    <div id="owl-demo" class="owl-carousel owl-theme">
-->
                                  <div class="ui segment">
                                      <div class="ui container center aligned">
                                          <a class="ui violet label">
                                                <h3>REDIAL-2020 workflow</h3>
                                          </a>
                                            <div class="img-responsive">
                                                <img src="images_other/webportal.png" alt="webportal image" align="left">
                                            </div>
                                      </div>
                                  </div>

                                  <div class="ui segment">
                                        <!-- About five different filters -->
                                      <div class="ui container center aligned">
                                          <a class="ui violet label">
                                                <h3>Five filters were applied, before building the predictive models</h3>
                                          </a>
                                            <p align="justify">
                                              1) SMILES were converted into canonical SMILES. Some of the SMILES were not converted into Canonical SMILES, thus discarded.
                                            </p>
                                            <p align="justify">
                                              2) RDKit Salt Stripper was implemented to obtain the salt stripped molecules. The 'donotRemoveEverything' feature helps by leaving the last salt when the entire Canonical SMILE contains only the salts.
                                            </p>
                                            <p align="justify">
                                              3) The RDKit 'Uncharger' feature uncharges molecules by adding or removing hydrogens.
                                            </p>
                                            <p align="justify">
                                              4) The Uncharged SMILES was converted to a standardized tautomer.
                                            </p>
                                            <p align="justify">
                                              5) Finally, logP and logS filters were implemented.
                                            </p>
                                      </div>
                                  </div>


                                      <!--  About Interpreting the results -->
                                  <div class="ui segment">
                                      <div class="ui container center aligned">
                                          <a class="ui violet label">
                                                <h3>Interpreting the Results</h3>
                                          </a>

                                                <h4>Live virus infectivity assays</h4>
                                                    <p align="justify">
                                                        The SARS-CoV-2 cytopathic effect (CPE) assay measures the ability of a compound to reverse the cytopathic effect induced by the virus in Vero E6 host cells. In other words, the viability of cells is reduced by the viral infection, and the compound ability to restore it is measured. Such an assay does not provide any information concerning the mechanism of action. Instead, it can be used to quickly quantify the antiviral behavior of the tested compound in a high-throughput way. However, the possibility that the compound itself may exhibit a certain degree of toxicity exists. That would also reduce cell viability, so that the interpretation of the CPE assay results would be misled. In fact, the compound protective activity could be masked by its intrinsic cytotoxicity. The host toxicity counter screen assay is aimed at detecting such eventualities. Therefore, a clear, positive result from the combined assays just described would consist of a compound showing protective effect and no cytotoxicity.
                                                    </p>
                                                <h4>Viral Entry Assays</h4>
                                                    <p align="justify">
                                                        The Spike-ACE2 protein-protein interaction (AlphaLISA) assay measures a compounds ability to mess up the interaction between the viral Spike protein and the human ACE2 receptor protein. Such protein-protein interaction eventually leads to viral entry into the host cells. Therefore, disrupting it may cripple the ability of SARS-CoV-2 virions to infect host cells. TruHits is a counter screen used to determine if compounds tested interfere with the AlphaLISA readout. It uses the biotin (vitamin H)-streptavidin interaction (one of the strongest non-covalent drug-protein interactions known in nature) because a compound will very unlikely disturb it.
                                                        Consequently, any compound showing interference with such interaction is probably a false positive, and it is probably messing with the assay readout in other ways. Common interfering agents are oxygen scavengers or molecules with spectral properties sensitive to the 600-700 nm wavelengths used in AlphaLISA. Therefore, this counter screen is used to verify that the activity observed in the AlphaLISA assay is not due to interference with the assay system itself.
                                                        The ACE2 enzymatic assay serves to measure the inhibition of human ACE2 to identify compounds with the potential to disrupt endogenous enzyme function. As already stated, the surface ACE2 receptor protein has been shown to be the primary host factor recognized and targeted by SARS-CoV-2 virions (6). This binding event between SARS-CoV-2 Spike protein and host ACE2 initiates binding of the viral capsid and leads to viral entry into host cells. ACE2 lowers blood pressure by catalyzing the hydrolysis of angiotensin II (a vasoconstrictor peptide) into the vasodilator angiotensin (1-7) (7). Even though the inhibition of the Spike-ACE2 interaction may result in the blocking of viral entry, possible off-target effects may occur because the endogenous vasodilating function of ACE2 might also be inhibited. Therefore, this assay is intended to detect such eventualities to reduce the risk of occurring off-target events.
                                                    </p>
                                                <h4>Viral replication Assays</h4>
                                                    <p align="justify">
                                                        Upon entry into the host cell, the major player in SARS-CoV-2 replication is the 3C-like proteinase (3CL, also called Mpro or main protease), which cleaves viral polyproteins into the various proteins that are involved in the replication steps (RNA polymerases, helicases, methyltransferases, etc.). The inhibition of such protein cleavage by blocking 3CL activity might disrupt the viral replication process. The SARS-CoV-2 3CL biochemical assay measures compounds ability to inhibit recombinant 3CL cleavage of a fluorescently labeled peptide substrate.
                                                    </p>

                                      </div>
                                  </div>

                                      <!--  About consensus results -->
                                  <div class="ui segment">
                                      <div class="ui container center aligned">
                                          <a class="ui violet label">
                                                <h3>About the Consensus Results</h3>
                                          </a>
                                              <p align="justify">
                                                Consensus models were generated based on three best performing models trained on fingerprint, pharmacophore, and physicochemical descriptors.
                                                The output is predicted based on the voting by three models.
                                                The output predicted by all three or any two is considered as a predicted label.
                                              </p>
                                      </div>
                                  </div>

                                      <!-- Table for consensus models -->
                                  <div class="ui segment">
                                      <div class="ui container center aligned">
                                          <a class="ui teal label">
                                                <h4>Test Results (Confusion Matrix)</h4>
                                          </a>

                                            <table class="ui celled padded table">
                                                <thead><tr><th title="Field #1">CLASS</th>
                                                <th title="Field #2">Models</th>
                                                <th title="Field #3">TP</th>
                                                <th title="Field #4">TN</th>
                                                <th title="Field #5">FP</th>
                                                <th title="Field #6">FN</th>
                                                </tr></thead>
                                                <tbody><tr>
                                                <td>CPE</td>
                                                <td>FP + DES + TPATF</td>
                                                <td align="right">35</td>
                                                <td align="right">39</td>
                                                <td align="right">12</td>
                                                <td align="right">16</td>
                                                </tr>
                                                <tr>
                                                <td>Host Tox Counter</td>
                                                <td>FP + DES + TPATF</td>
                                                <td align="right">85</td>
                                                <td align="right">90</td>
                                                <td align="right">35</td>
                                                <td align="right">40</td>
                                                </tr>
                                                <tr>
                                                <td>AlphaLisa</td>
                                                <td>DES</td>
                                                <td align="right">71</td>
                                                <td align="right">73</td>
                                                <td align="right">21</td>
                                                <td align="right">24</td>
                                                </tr>
                                                <tr>
                                                <td>TruHit</td>
                                                <td>FP + DES + TPATF</td>
                                                <td align="right">92</td>
                                                <td align="right">89</td>
                                                <td align="right">35</td>
                                                <td align="right">33</td>
                                                </tr>
                                                <tr>
                                                <td>ACE2 Enzymatic</td>
                                                <td>DES</td>
                                                <td align="right">7</td>
                                                <td align="right">7</td>
                                                <td align="right">8</td>
                                                <td align="right">9</td>
                                                </tr>
                                                <tr>
                                                <td>3CL Enzymatic</td>
                                                <td>FP + DES + TPATF</td>
                                                <td align="right">24</td>
                                                <td align="right">21</td>
                                                <td align="right">12</td>
                                                <td align="right">10</td>
                                                </tr>
                                                </tbody></table>
                                      </div>

                                          <div class="ui segment">
                                            FP = RDKit Fingerprints<br/>
                                            DES = RDKit Descriptors<br/>
                                            TPATF = Topological Pharmacophore Features
                                          </div>
                                  </div>

                                  <div class="ui segment">
                                      <div class="ui container center aligned">
                                          <a class="ui teal label">
                                                <h4>CPE Models - Test Results</h4>
                                          </a>

                                        <table class="ui celled padded table">
                                            <thead>
                                              <tr>
                                                  <!-- <th class="single line">CLASS</th> -->
                                                  <th>Input features</th>
                                                  <th>Models</th>
                                                  <th>Accuracy</th>
                                                  <th>F1</th>
                                                  <th>AUC</th>
                                                  <th>Recall</th>
                                                  <th>Precision</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <!-- <td>Activity</td> -->
                                                <td class="single line">FCFP4</td>
                                                <td class="right aligned">XGB</td>
                                                <td class="right aligned">
                                                  0.696
                                                </td>
                                                <td class="right aligned">
                                                  0.695
                                                </td>
                                                <td class="right aligned">
                                                  0.696
                                                </td>
                                                <td class="right aligned">
                                                  0.696
                                                </td>
                                                <td class="right aligned">
                                                  0.698
                                                </td>
                                              </tr>

                                              <tr>
                                                <!-- <td>Activity</td> -->
                                                <td class="single line">rdkDes</td>
                                                </td>
                                                <td class="right aligned">CNB</td>
                                                <td class="right aligned">
                                                  0.608
                                                </td>
                                                <td class="right aligned">
                                                  0.606
                                                </td>
                                                <td class="right aligned">
                                                  0.608
                                                </td>
                                                <td class="right aligned">
                                                  0.608
                                                </td>
                                                <td class="right aligned">
                                                  0.609
                                                </td>
                                              </tr>

                                              <tr>
                                                <!-- <td>Activity</td> -->
                                                <td class="single line">TPATF</td>
                                                <td class="right aligned">LR</td>
                                                <td class="right aligned">
                                                  0.647
                                                </td>
                                                <td class="right aligned">
                                                  0.647
                                                </td>
                                                <td class="right aligned">
                                                  0.647
                                                </td>
                                                <td class="right aligned">
                                                  0.647
                                                </td>
                                                <td class="right aligned">
                                                  0.647
                                                </td>
                                              </tr>

                                              <tr>
                                                <!-- <td>Activity</td> -->
                                                <td class="single line">Consensus</td>
                                                <td class="right aligned">All</td>
                                                <td class="right aligned">
                                                  0.725
                                                </td>
                                                <td class="right aligned">
                                                  0.725
                                                </td>
                                                <td class="right aligned">
                                                  0.725
                                                </td>
                                                <td class="right aligned">
                                                  0.726
                                                </td>
                                                <td class="right aligned">
                                                  0.727
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                      </div>
                                  </div>

                                      <!-- Adding results toxicity models -->
                                  <div class="ui segment">
                                      <div class="ui container center aligned">
                                          <a class="ui teal label">
                                                <h4>Host Tox Counter Models - Test Results</h4>
                                          </a>

                                        <table class="ui celled padded table">
                                            <thead>
                                              <tr>
                                                  <!-- <th class="single line">CLASS</th> -->
                                                  <th>Input features</th>
                                                  <th>Models</th>
                                                  <th>Accuracy</th>
                                                  <th>F1</th>
                                                  <th>AUC</th>
                                                  <th>Recall</th>
                                                  <th>Precision</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <!-- <td>Toxicity</td> -->
                                                <td class="single line">rdk5</td>
                                                <td class="right aligned">KN</td>
                                                <td class="right aligned">
                                                  0.696
                                                </td>
                                                <td class="right aligned">
                                                  0.696
                                                </td>
                                                <td class="right aligned">
                                                  0.696
                                                </td>
                                                <td class="right aligned">
                                                  0.696
                                                </td>
                                                <td class="right aligned">
                                                  0.696
                                                </td>
                                              </tr>

                                              <tr>
                                                <!-- <td>Toxicity</td> -->
                                                <td class="single line">rdkDes</td>
                                                <td class="right aligned">XGB</td>
                                                <td class="right aligned">
                                                  0.68
                                                </td>
                                                <td class="right aligned">
                                                  0.679
                                                </td>
                                                <td class="right aligned">
                                                  0.68
                                                </td>
                                                <td class="right aligned">
                                                  0.68
                                                </td>
                                                <td class="right aligned">
                                                  0.682
                                                </td>
                                              </tr>

                                              <tr>
                                                <!-- <td>Toxicity</td> -->
                                                <td class="single line">TPATF</td>
                                                <td class="right aligned">XGB</td>
                                                <td class="right aligned">
                                                  0.684
                                                </td>
                                                <td class="right aligned">
                                                  0.684
                                                </td>
                                                <td class="right aligned">
                                                  0.684
                                                </td>
                                                <td class="right aligned">
                                                  0.684
                                                </td>
                                                <td class="right aligned">
                                                  0.684
                                                </td>
                                              </tr>

                                              <tr>
                                                <!-- <td>Toxicity</td> -->
                                                <td class="single line">Consensus</td>
                                                <td class="right aligned">All</td>
                                                <td class="right aligned">
                                                  0.70
                                                </td>
                                                <td class="right aligned">
                                                  0.70
                                                </td>
                                                <td class="right aligned">
                                                  0.70
                                                </td>
                                                <td class="right aligned">
                                                  0.70
                                                </td>
                                                <td class="right aligned">
                                                  0.70
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>


                                      </div>
                                  </div>

                                      <!-- Adding results AlphaLisa models -->
                                  <div class="ui segment">
                                      <div class="ui container center aligned">
                                          <a class="ui teal label">
                                                <h4>AlphaLisa Models - Test Results</h4>
                                          </a>

                                        <table class="ui celled padded table">
                                        <thead><tr><th title="Field #1">Input feature</th>
                                        <th title="Field #2">Models</th>
                                        <th title="Field #3">Accuracy</th>
                                        <th title="Field #4">F1</th>
                                        <th title="Field #5">AUC</th>
                                        <th title="Field #6">Recall</th>
                                        <th title="Field #7">Precision</th>
                                        </tr></thead>
                                        <tbody><tr>
                                        <td>rdkDes</td>
                                        <td>RF</td>
                                        <td align="right">0.762</td>
                                        <td align="right">0.762</td>
                                        <td align="right">0.762</td>
                                        <td align="right">0.762</td>
                                        <td align="right">0.762</td>
                                        </tr>
                                        <tr>
                                        <td>TPATF</td>
                                        <td>MLP</td>
                                        <td align="right">0.704</td>
                                        <td align="right">0.704</td>
                                        <td align="right">0.704</td>
                                        <td align="right">0.704</td>
                                        <td align="right">0.705</td>
                                        </tr>
                                        <tr>
                                        <td>LAVAL</td>
                                        <td>XGB</td>
                                        <td align="right">0.73</td>
                                        <td align="right">0.73</td>
                                        <td align="right">0.73</td>
                                        <td align="right">0.73</td>
                                        <td align="right">0.731</td>
                                        </tr>
                                        <tr>
                                        <td>Consensus</td>
                                        <td>All</td>
                                        <td align="right">0.746</td>
                                        <td align="right">0.746</td>
                                        <td align="right">0.746</td>
                                        <td align="right">0.746</td>
                                        <td align="right">0.747</td>
                                        </tr>
                                        </tbody></table>

                                      </div>
                                  </div>

                                      <!-- Adding results ACE2 Enzymatic Models -->
                                  <div class="ui segment">
                                      <div class="ui container center aligned">
                                          <a class="ui teal label">
                                                <h4>ACE2 Enzymatic Models - Test Results</h4>
                                          </a>

                                        <table class="ui celled padded table">
                                            <thead><tr><th title="Field #1">Input feature</th>
                                            <th title="Field #2">Models</th>
                                            <th title="Field #3">Accuracy</th>
                                            <th title="Field #4">F1</th>
                                            <th title="Field #5">AUC</th>
                                            <th title="Field #6">Recall</th>
                                            <th title="Field #7">Precision</th>
                                            </tr></thead>
                                            <tbody><tr>
                                            <td>rdkDes</td>
                                            <td>KN</td>
                                            <td align="right">0.452</td>
                                            <td align="right">0.452</td>
                                            <td align="right">0.452</td>
                                            <td align="right">0.453</td>
                                            <td align="right">0.453</td>
                                            </tr>
                                            <tr>
                                            <td>TPATF</td>
                                            <td>MNB</td>
                                            <td align="right">0.774</td>
                                            <td align="right">0.774</td>
                                            <td align="right">0.775</td>
                                            <td align="right">0.775</td>
                                            <td align="right">0.775</td>
                                            </tr>
                                            <tr>
                                            <td>rdk7</td>
                                            <td>ExtraTree</td>
                                            <td align="right">0.645</td>
                                            <td align="right">0.631</td>
                                            <td align="right">0.64</td>
                                            <td align="right">0.64</td>
                                            <td align="right">0.659</td>
                                            </tr>
                                            <tr>
                                            <td>Consensus</td>
                                            <td>All</td>
                                            <td align="right">0.71</td>
                                            <td align="right">0.705</td>
                                            <td align="right">0.706</td>
                                            <td align="right">0.706</td>
                                            <td align="right">0.717</td>
                                            </tr>
                                            </tbody></table>

                                      </div>
                                  </div>

                                      <!-- Adding results TruHit Models -->
                                  <div class="ui segment">
                                      <div class="ui container center aligned">
                                          <a class="ui teal label">
                                                <h4>TruHit Models - Test Results</h4>
                                          </a>

                                        <table class="ui celled padded table">
                                                <thead><tr><th title="Field #1">Input feature</th>
                                                <th title="Field #2">Models</th>
                                                <th title="Field #3">Accuracy</th>
                                                <th title="Field #4">F1</th>
                                                <th title="Field #5">AUC</th>
                                                <th title="Field #6">Recall</th>
                                                <th title="Field #7">Precision</th>
                                                </tr></thead>
                                                <tbody><tr>
                                                <td>HashAP</td>
                                                <td>XGB</td>
                                                <td align="right">0.727</td>
                                                <td align="right">0.726</td>
                                                <td align="right">0.727</td>
                                                <td align="right">0.727</td>
                                                <td align="right">0.728</td>
                                                </tr>
                                                <tr>
                                                <td>rdkDes</td>
                                                <td>MLP</td>
                                                <td align="right">0.727</td>
                                                <td align="right">0.727</td>
                                                <td align="right">0.727</td>
                                                <td align="right">0.727</td>
                                                <td align="right">0.728</td>
                                                </tr>
                                                <tr>
                                                <td>TPATF</td>
                                                <td>KN</td>
                                                <td align="right">0.655</td>
                                                <td align="right">0.654</td>
                                                <td align="right">0.655</td>
                                                <td align="right">0.655</td>
                                                <td align="right">0.656</td>
                                                </tr>
                                                <tr>
                                                <td>Consensus</td>
                                                <td>All</td>
                                                <td align="right">0.727</td>
                                                <td align="right">0.727</td>
                                                <td align="right">0.727</td>
                                                <td align="right">0.727</td>
                                                <td align="right">0.727</td>
                                                </tr>
                                                </tbody></table>
                                      </div>
                                  </div>

                                      <!-- Adding results 3CL Enzymatic Models -->
                                  <div class="ui segment">
                                      <div class="ui container center aligned">
                                          <a class="ui teal label">
                                                <h4>3CL Enzymatic Models - Test Results</h4>
                                          </a>

                                        <table class="ui celled padded table">
                                            <thead><tr><th title="Field #1">Input feature</th>
                                            <th title="Field #2">Models</th>
                                            <th title="Field #3">Accuracy</th>
                                            <th title="Field #4">F1</th>
                                            <th title="Field #5">AUC</th>
                                            <th title="Field #6">Recall</th>
                                            <th title="Field #7">Precision</th>
                                            </tr></thead>
                                            <tbody><tr>
                                            <td>rdkDes</td>
                                            <td>ExtraTree</td>
                                            <td align="right">0.597</td>
                                            <td align="right">0.596</td>
                                            <td align="right">0.596</td>
                                            <td align="right">0.596</td>
                                            <td align="right">0.597</td>
                                            </tr>
                                            <tr>
                                            <td>TPATF</td>
                                            <td>MLP</td>
                                            <td align="right">0.612</td>
                                            <td align="right">0.611</td>
                                            <td align="right">0.613</td>
                                            <td align="right">0.613</td>
                                            <td align="right">0.614</td>
                                            </tr>
                                            <tr>
                                            <td>FCFP4</td>
                                            <td>KN</td>
                                            <td align="right">0.627</td>
                                            <td align="right">0.622</td>
                                            <td align="right">0.625</td>
                                            <td align="right">0.625</td>
                                            <td align="right">0.632</td>
                                            </tr>
                                            <tr>
                                            <td>Consensus</td>
                                            <td>All</td>
                                            <td align="right">0.672</td>
                                            <td align="right">0.671</td>
                                            <td align="right">0.671</td>
                                            <td align="right">0.671</td>
                                            <td align="right">0.672</td>
                                            </tr>
                                            </tbody></table>
                                      </div>
                                  </div>


                            <!-- For more slides -->
                              <!-- <div class="span6"><h4>Header</h4></div> -->
<!--
                    </div>
-->

                    <!-- owl-carousel owl-theme closed -->
                    <!-- Adding javscripts files -->
                    <script src="vendor/jquery2/jquery.2.min.js"></script>
                    <script src="vendor/owl_carousel2/js/owl.carousel.min.js"></script>
                    <script src="vendor/jquery2/jquery.js"></script>
<!--
          </div>
-->

          <!-- Wrapper closed -->
</div>

<div class="ui segment">
    <div class="ui container left aligned">
        <p>
        <h4>References:</h4>
        1. <a href="https://www.biorxiv.org/content/10.1101/2020.06.04.135046v1" target="_blank">https://www.biorxiv.org/content/10.1101/2020.06.04.135046v1</a><br/>
        2. <a href="https://opendata.ncats.nih.gov/covid19/" target="_blank">https:https://opendata.ncats.nih.gov/covid19/</a><br/>
        3. <a href="https://opendata.ncats.nih.gov/covid19/assay?aid=15" target="_blank">https:https://opendata.ncats.nih.gov/covid19/assay?aid=15</a><br/>
        4. <a href="https://opendata.ncats.nih.gov/covid19/assay?aid=14" target="_blank">https://opendata.ncats.nih.gov/covid19/assay?aid=14</a><br/>
        5. <a href="https://ochem.eu/" target="_blank">https://ochem.eu/</a><br/>
        6. <a href="https://doi.org/10.1016/j.virol.2017.12.015" target="_blank">https://doi.org/10.1016/j.virol.2017.12.015</a><br/>
        7. <a href="https://academic.oup.com/cardiovascres/article/73/3/463/367423" target="_blank">https://academic.oup.com/cardiovascres/article/73/3/463/367423</a><br/>
        </p>

        <p>
        <h4>GitHub:</h4>
        <a href="https://github.com/sirimullalab/redial-2020" target="_blank">https://github.com/sirimullalab/redial-2020</a><br/>
        </p>

        <p>
        <h4>DockerHub:</h4>
        <a href="https://hub.docker.com/r/sirimullalab/redial-2020" target="_blank">https://hub.docker.com/r/sirimullalab/redial-2020</a><br/>
        </p>
    </div>
</div>