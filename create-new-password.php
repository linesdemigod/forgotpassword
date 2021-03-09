<?php 
    require_once "layouts/header.php";
?>

<main>
    <section>
        <div class="arb-para parallax-container">
		        <h2 class="para-h2 white-text darken-4 center-align">RESET PASSWORD</h2>
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
                <h5 class="center-align">Reset Password</h5>
                <div class="center red-text fontp">
                <?php
                     $selector = $_GET["selector"];
                     $validator = $_GET["validator"];
             
                     if(empty($selector) || empty($validator)) {
             
                         echo "Could not validate your request!";
                     } else {
             
                         if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) { 
                ?>
                </div>
                    <form action="includes/reset-password.inc.php" method="post">
                        <div class="input-field">
                            <input type="hidden" name="selector" id="name" value="<?php echo $selector ?>">
                        </div>
                        <div class="input-field">
                            <input type="hidden" name="validator" id="name" value="<?php echo $validator ?>">
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">password</i>
                            <input type="password"  name="pwd" id="password">
                            <label for="password">Enter new Password</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">password</i>
                            <input type="password"  name="pwd-repeat" id="password">
                            <label for="password">Repeat Password</label>
                        </div>
                        <div class="input-field center">
                            <button type="submit" name="reset-request-submit" class="btn">Reset Password</button>
                        </div>
                        <div class="input-field center">
                        
                    </form>
                    <?php 
            }
        }
    
    ?>
                </div>
            </div>
        </div>
    </section>
    <br><br><br>
</main>

<?php 
    require_once "layouts/footer.php";
?>