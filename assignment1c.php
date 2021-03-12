<?php

    //retrieve the submitted values
    $firstNumber = $_GET["firstNumber"];
    $secondNumber = $_GET["secondNumber"];

    //check for form submission
    if (isset($_GET["form1"])) {
        $formSubmit = true;
    } else {
        $formSubmit = false;
    }

    //error checking
    $errors = 0;
    if ($formSubmit && $firstNumber == "") $errors = 1;
    if ($formSubmit && $secondNumber == "") $errors = 2;
    if ($formSubmit && !is_Numeric($firstNumber)) $errors = 3;
    if ($formSubmit && !is_Numeric($secondNumber)) $errors = 4;

    //if there are errors, show the form
    if ($errors > 0 || !$formSubmit) {
?>
<!DOCTYPE html>
<HTML>
    <HEAD>
        <TITLE>My Test Form</TITLE>
    </HEAD>
    <BODY>
        <P>Please enter 2 numbers. Fields marked with (*) are
            required.</P>
        <FORM action="" method="GET">

First Number*: <INPUT TYPE="text" name="firstNumber" value="<?php echo $firstNumber; ?>" />
<?php if ($formSubmit && $firstNumber == "") echo " <font color='red'>
<strong><sup>*</sup>required</strong></font>";
else if ($formSubmit && !is_Numeric($firstNumber)) echo " <font color='red'>
<strong><sup>*</sup>Please enter numbers only</strong></font>";  ?>
<br />

Second Number*: <INPUT TYPE="text" name="secondNumber" value="<?php echo $secondNumber; ?>" />
<?php if ($formSubmit && $secondNumber == "") echo " <font color='red'>
<strong><sup>*</sup>required</strong></font>";
else if ($formSubmit && !is_Numeric($secondNumber)) echo " <font color='red'>
<strong><sup>*</sup>Please enter numbers only</strong></font>";  ?>
<br />

<INPUT TYPE="submit" name="form1" value="submit" />
        </FORM>
    </BODY>
</HTML>
<?php
    } else {
    //No errors
    //Defining php functions
    
    function addThem($firstNumber, $secondNumber) {
    $sum = $firstNumber + $secondNumber;
    return $sum;
    }

    function subtractThem($firstNumber, $secondNumber) {
    $difference = $firstNumber - $secondNumber;
    return $difference;
    }

    function multiplyThem($firstNumber, $secondNumber) {
    $product = $firstNumber * $secondNumber;
    return $product;
    }

    function divideThem($firstNumber, $secondNumber) {
    $quotient = $firstNumber / $secondNumber;
    return $quotient;
    }


    //Calling php functions
    $return_value = addThem($firstNumber, $secondNumber);
    echo "$firstNumber plus $secondNumber is $return_value";

    $return_value = subtractThem($firstNumber, $secondNumber);
    echo "<br />$firstNumber minus $secondNumber is $return_value";

    $return_value = multiplyThem($firstNumber, $secondNumber);
    echo "<br />$firstNumber multiplied by $secondNumber is $return_value";

    $return_value = divideThem($firstNumber, $secondNumber);
    echo "<br />$firstNumber divided by $secondNumber is $return_value";
    }
?>