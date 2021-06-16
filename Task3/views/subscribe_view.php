<script type="text/javascript">
    function validate (){
        var email = $('#email').val();
        var agreeTerms = $('#cb_agreeTerms').is(':checked');

        $(".error").remove();
        if(!agreeTerms){
            $('#errorContainer').append('<span class="error">You must accept the terms and conditions </span><br/>');
        }
        if (email.length < 1) {
            $('#errorContainer').append('<span class="error">Email address is required</span>');
        } else {
            var regEx = /^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
            var validEmail = regEx.test(email);
            if (!validEmail) {
                $('#errorContainer').append('<span class="error">Please provide a valid e-mail address!</span>');
            }else{
                var emailCheck = email.toLowerCase();
                if(emailCheck[emailCheck.length-2]=='c'&&emailCheck[emailCheck.length-1]=='o')
                    $('#errorContainer').append('<span class="error">We are not accepting subscriptions from Colombia emails!</span>');
            }
        }
        if($(".error").length > 0){
            $("#submitButton").prop("disabled",true);
        }else{
            $("#submitButton").prop("disabled",false);
        }
    }
    $(document).ready(function () {

        $('#mailForm').submit(function (e) {
            validate();

            if ($(".error").length > 0) {
                e.preventDefault();
                if(typeof(window.validationObject) =="undefined"){
                    window.validationObject = {handlersAttached: true}
                    $("#cb_agreeTerms").change(validate);
                    $("#email").on('input', validate);
                }
            }
        });

    })
</script>
<div class="background"></div>
<div class="menu">
    <span class="logo"></span>
    <span id="logoText">pineapple.</span>
    <a href="#">About</a>
    <a href="#">How it works</a>
    <a href="#">Contact</a>
</div>
<div class="formContainer">
    <form action="#" method="post" id="mailForm">
        <fieldset style="border: none;">
            <div class="formBgContainer">
                <?php if(!$this->subscriptionAdded) { ?>
                <div class="subscribe">Subscribe to newsletter</div>
                <div class="subscribeDescription" >Subscribe to our newsletter and get 10% discount on pineapple glasses.</div>
                <div class="emailContainer"><div class="emailInnerContainer"><input type="text" name="email" id="email" placeholder="Type your email address here…" <?php if(isset($this->email)){ ?>value="<?= $this->email ?>" <?php }?>><input type="submit" class="submit" id="submitButton" value="" /></div>
                </div>
                <div class="termsContainer"><input type="checkbox" id="cb_agreeTerms" <?php if($this->cb_agreeTerms) {?>checked<?php }?> name="cb_agreeTerms" /> <label for="cb_agreeTerms">I agree to <a href="#">terms of service</a></label></div>
                <div id="errorContainer"><?php  if(isset($this->agreedTerms)){ if(!$this->agreedTerms) { ?><span class="error">You must accept the terms and conditions </span><br/><?php } } ?>
                    <?php if(isset($this->enteredEmail)){ if(!$this->enteredEmail) { ?><span class="error">Email address is required </span><br/><?php } }?>
                    <?php if(isset($this->enteredValidEmail)){ if(!$this->enteredValidEmail) { ?><span class="error">Please provide a valid e-mail address! </span><br/><?php } } ?>
                    <?php if(isset($this->enteredColumbianEmail)){ if($this->enteredColumbianEmail) { ?><span class="error">We are not accepting subscriptions from Colombia emails!</span><br/><?php } } ?>
                </div>
                <div class="hrContainer"><hr /></div>
<?php } else { ?>
                <div class="preUnion" ></div>
                <div class="union" ></div>
                <div class="thanksTitle"  >Thanks for subscribing</div>
                <div class="thanksDescription"  >You have successfully subscribed to our email listing. Check your email for the discount code.</div>
                <div class="hrThanksContainer"  ><hr /></div>
<?php } ?>
                <div class="<?= ($this->subscriptionAdded ? 'iconsThanksContainer': 'iconsContainer') ?>"><span id="ic_facebook"></span><span id="ic_instagram"></span>
                    <span id="ic_twitter"></span><span id="ic_youtube"></span></div>
            </div>
        </fieldset></form>

</div>