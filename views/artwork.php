<div class="mainContainer">

    <div class="row">
        <div class="col-md-1">
           
        </div>
        <div class="col-md-7" id="recArtwork">
            <h1 class="display-1">Artwork Catalog</h1>
            
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Preview</th>
                </tr>
            </thead>
            <tbody>
                <?php displayArtwork(); ?>
            </tbody>
            </table>
  


           
        </div>

        <div class="col-md-4">

                <?php displaySearch(); ?>

        </div>

    </div>
    
    

</div>