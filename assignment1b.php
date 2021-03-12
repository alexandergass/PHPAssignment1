<?php

    //retrieve the submitted values
    $userDate = $_GET["userDate"];

    //check for form submission
    if (isset($_GET["form1"])) {
        $formSubmit = true;
    } else {
        $formSubmit = false;
    }

    //error checking
    $errors = 0;
    if ($formSubmit && $userDate == "") $errors = 1;

    //if there are errors, show the form
    if ($errors > 0 || !$formSubmit) {
?>
<!DOCTYPE html>
<HTML>
    <HEAD>
        <TITLE>My Test Form</TITLE>
    </HEAD>
    <BODY>
        <P>Please enter a date (YYYY-MM-DD)to find the days between it and June 30, 2016. Fields marked with (*) are
            required.</P>
        <FORM action="" method="GET">

Date*: <INPUT TYPE="text" name="userDate" placeholder="YYYY-MM-DD" value="<?php echo $userDate; ?>"
pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" />

<?php if ($formSubmit && $userDate == "") echo " <font color='red'>
<strong><sup>*</sup>Enter date in correct formate YYYY-MM-DD</strong></font>";
?>

<br />
<INPUT TYPE="submit" name="form1" value="submit" />
        </FORM>
    </BODY>
</HTML>
<?php
    } else {
    //No errors, display values
    echo "Date entered: ";
    echo $userDate;

    echo "<br />";
    
    $defaultDate = "2016-06-30";
    echo "Days between $defaultDate and $userDate: ";

    $defaultDate = strtotime("$defaultDate");
    $userDate = strtotime("$userDate");
    $dateDiff = $defaultDate - $userDate;

    echo abs(round($dateDiff/(60*60*24)));

    }
?>