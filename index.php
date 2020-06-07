<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>International Telephone Input</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css">

</head>
<style>
.intl-tel-input{
  width: 100%;
}
  </style>
<body>
  <h1>International Telephone Input</h1>
  <form method="Post">
    <input id="phone" name="phone" class="intl-tel-input" type="tel">
    <button name="btn" type="submit">Submit</button>
  </form>
<?php
  if(isset($_POST['btn'])){

   var_dump($_POST['phone']);
  }

?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput-jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>

  <script>
    var input = document.querySelector("#phone");
    intlTelInput(input, {
      utilsScript: "build/js/utils.js",
      autoFormat: false,
      autoHideDialCode: false,
      autoPlaceholder: false,
      defaultCountry: "auto",
      ipinfoToken: "yolo",
      nationalMode: false,
      numberType: "MOBILE",

preventInvalidNumbers: true,
    });
    // $("#phone").intlTelInput("getSelectedCountryData").dialCode;
    // instance.destroy();
    // var instance = window.intlTelInputGlobals.getInstance(input);
    // var extension = instance.getExtension();
    // var number = instance.getNumber(intlTelInputUtils.numberFormat.E164);
    // instance.setPlaceholderNumberType("FIXED_LINE");

  </script>
</body>

</html>