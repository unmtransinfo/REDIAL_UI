<style>

.copy:hover
{
    color: red;
    background-color:white;
}

</style>


    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="span7 offset1">
          <form enctype="multipart/form-data" target="_blank" action="/index2.php" method="POST">

            <div class="ui container left aligned">
                <a class="ui grey label"><h3>A portal for estimating Anti-SARS-CoV-2 activities</h3></a>
            </div>

            <div class="row">
              <div class="span3">
                <div class="well">
                    <label class="control-label"><p></p><h4><font color="#616D7E">Provide an Input string: </font></h4><p></p></label>
                    <input class="span2" type="text" name="smiles" size="40" placeholder="Enter: Drug, SMILES, PubChem CID">

                    <h5>
                        Some Examples:  <a href="#" class="copy">CC(=O)OC1=CC=CC=C1C(=O)O</a> |
                        <a href="#" class="copy">Remdesivir</a> |
                        <a href="#" class="copy">121304016</a>
                    </h5>

                    <button name="submit" type="submit" style="padding: 4px 10px" value="smiles" class="btn btn-inverse"><i class="icon-play"></i><b>SUBMIT</b></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

<!-- Function for copying text in input box -->
    <script>
            $(document).on('click', '.copy', function(e){
                e.preventDefault(); //for <a>
                $('.span2').val($(this).text());
            });
    </script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
