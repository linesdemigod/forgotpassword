<?php 
    require_once "layouts/header.php";
?>

<main>
    <section>
        <div class="arb-para parallax-container">
		        <h2 class="para-h2 white-text darken-4 center-align">PASSWORD RESET</h2>
            <div class="parallax">
                <img src="img/sec.jpg" alt="law" class="responsive-img">
            </div>
        </div>
    </section>
    <br><br><br><br>
    <section>
   
        <div class="container">
            <div class="row">
                <div class="col s6 m6 l6">
                    <img src="img/acc.jpg" alt="law" class="responsive-img">
                </div>
                <div class="col s6 m6 l6">
                <h5 class="center-align">Password Reset</h5>
                <div class="center red-text fontp">
                </div>
                    <form action="includes/reset-request.inc.php" method="post">
                        <div class="input-field">
                            <i class="material-icons prefix">email</i>
                            <input type="text" name="email" id="email">
                            <label for="email">Enter Email here</label>
                        </div>
                        
                        <div class="input-field center">
                            <button type="submit" name="reset-request-submit" class="btn">Reset Password</button>
                        </div>
                        <div class="input-field center">
                        <?php
                            if(isset($_GET["reset"])) {
                                if($_GET["reset"] == "success") {
                                    echo '<p>Check your email!</p>';
                                }
                            }
                        
                            ?>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <br><br><br>
</main>

<?php 
    require_once "layouts/footer.php";
?>