<?PHP
/*
    Contact Form from HTML Form Guide
    This program is free software published under the
    terms of the GNU Lesser General Public License.
    See this page for more info:
    http://www.html-form-guide.com/contact-form/simple-php-contact-form.html
*/
require_once("./include/fgcontactform.php");

$formproc = new FGContactForm();


//1. Add your email address here.
//You can add more than one receipients.
$formproc->AddRecipient('info@egarchitecture.be'); //<<---Put your email address here


//2. For better security. Get a random tring from this link: http://tinyurl.com/randstr
// and put it here
$formproc->SetFormRandomKey('CnRrspl1FyEylUj');


if(isset($_POST['submitted']))
{
   if($formproc->ProcessForm())
   {
        $formproc->RedirectToURL("thank-you.php");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Contact us</title>
      <link rel="STYLESHEET" type="text/css" href="contact.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
      
      <!-- TYPEKIT -->
	<script src="//use.typekit.net/wqm3hfu.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
</head>
<body>

<form id='contactus' action='<?php echo $formproc->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>

<input type='hidden' name='submitted' id='submitted' value='1'/>
<input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
<input type='text'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />

<div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>
<div class='container'>
    <input type='text' name='name' id='name' value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" placeholder="NOM & PRÉNOM" />
    <span id='contactus_name_errorloc' class='error'></span>
</div>
<div class='container'>
    <input type='text' name='email' id='email' value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" placeholder="ADRESSE EMAIL" />
    <span id='contactus_email_errorloc' class='error'></span>
</div>

<div class='container'>
    <span id='contactus_message_errorloc' class='error'></span>
    <textarea rows="10" cols="100" placeholder="MESSAGE" name='message' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>
</div>


<div class='container'>
    <input type='submit' name='Submit' value='ENVOYER' />
</div>

</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("contactus");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Veuillez entrer votre nom");

    frmvalidator.addValidation("email","req","Veuillez entrer votre adresse email");

    frmvalidator.addValidation("email","email","Veuillez entrer une adresse email valide");

    frmvalidator.addValidation("message","maxlen=2048","Ce message est trop long!");

// ]]>
</script>

</body>
</html>