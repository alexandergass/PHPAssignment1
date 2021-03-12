<?php

    //retrieve the submitted values
    $dNumber = $_GET["dNumber"];

    //check for form submission
    if (isset($_GET["form1"])) {
        $formSubmit = true;
    } else {
        $formSubmit = false;
    }

    //error checking
    $errors = 0;
    if ($formSubmit && $dNumber == "") $errors = 1;
    if ($formSubmit && !is_Numeric($dNumber)) $errors = 2;
    //if ($formSubmit && ($dNumber % 1 == 0)) $errors = 3;
    if( floor($dNumber) == $dNumber) $errors = 3;

    //if there are errors, show the form
    if ($errors > 0 || !$formSubmit) {
?>
<!DOCTYPE html>
<HTML>
    <HEAD>
        <TITLE>My Test Form</TITLE>
    </HEAD>
    <BODY>
        <P>Please enter a decimal number. Fields marked with (*) are
            required.</P>
        <FORM action="" method="GET">

Decimal Number*: <INPUT TYPE="text" name="dNumber" value="<?php echo $dNumber; ?>" />
<?php if ($formSubmit && $dNumber == "") echo " <font color='red'>
<strong><sup>*</sup>required</strong></font>";
    else if ($formSubmit && !is_Numeric($dNumber)) echo " <font color='red'>
<strong><sup>*</sup>Please enter numbers only</strong></font>";
    else if ($formSubmit && floor($dNumber) == $dNumber) echo " <font color='red'>
<strong><sup>*</sup>Please enter decimal number not ending in .0 </strong></font>"; ?>

<br />
<INPUT TYPE="submit" name="form1" value="submit" />
        </FORM>
    </BODY>
</HTML>
<?php
    } else {
    //No errors, display values
    echo "Number entered: ";
    echo $dNumber;

    echo "<br />Ceiling: ";
    echo ceil($dNumber);

    echo "<br />Floor: ";
    echo floor($dNumber);

    echo "<br />Rounding: ";
    echo round($dNumber);
    }
?>