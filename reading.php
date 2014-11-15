
sample code
php for m-c quiz
(with comments)
home stories reading grammar
about this page    uncommented version
logo
explanation

• Apart from the explanatory comments, the code displayed below is identical with the code used to produce this multiple choice quiz.

• The code is "valid." In other words, it follows the grammatical rules of the "markup language" in which it is written (XHTML 1.0 Transitional). This can be confirmed by going to the W3C Validator.

• An uncommented version is also available.

• If this code is cut and pasted into an html editor file named "display_code_2.php" and then viewed in a browser, it should run properly.

• For a discussion of the obstacles facing a "do-it-yourselfer" who wants to write interactive quizzes in php—and advice on how these obstacles can be overcome—see the about file for this page.
the code
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <title>
            sample quiz code
        </title>
<!--since this document is unformatted, there is nothing between the style tags.
(Note that this comment is 'marked' as an html comment because it is in the html
 section of the document.)-->
<style type="text/css">
</style>
    </head>
    <body>
<?php
/*The php code begins here and ends below, just before the "body" and 
"html" tags. All the html that appears inside the php section is "generated"
with "print" commands.*/

print '<form action="display_code_2.php" method="post">';
/*The entire php section of this script (i.e. this code)is a "form." It is 
opened here and closed just before the php section comes to an end. The form
"tag" has two "attributes." The second one, "method," stipulates
that the information to be sent as a "POST" "variable." The first attribute,
 "action" gives the "address" to which the information is to be sent when
 it is submitted. In this case the address, "sample_quiz_code.php" is the
 same as the address of the page on which the code appears. In other words
 the page is sending information to itself. */

//BEGINNING OF QUESTION ONE

/*How the quiz is organized: each time the page is visited, there are two
possible situations: (1) the user is going to the page by clicking
on a link or typing the pages's address into the "address bar." Because
the "submit" button has not been clicked, no information has been sent
in a POST variable and the user sees a "fresh" quiz. (2)  a user has clicked
the "submit" button and therefore information has been sent in a POST variable. 
In this case, the user sees a new version of the page that differs from the
"fresh" version. If any questions have been answered, one of the radio buttons
for that question will have been "filled in"; if the test has not been
finished, the user will be asked to answer the unanswered ones; if the test
has been finished, the user will be told their score and given the correct
answers.*/ 

/*Now an identical procedure is followed for the second and third questions*/

print '<p>(1) The capital of Egypt is</p>';

/*The "if/else" statement that begins in the next line is the script's first
 "real" php (as opposed to the php-generated html). Notice that it is not preceded
 by a "print" command. 
The script runs whenever the page is opened or when the user clicks the submit
 button. It begins with the first of the three questions in the quiz, looking
 to see which, if any, of the four radio buttons connected with that question
 has been "checked." */
if ($_POST['answer1']=="a")
print '<input type="radio" checked="checked" name="answer1" value="a"/>Alexandria<br/>';
/*If the information that a user has selected "Alexandria" as the answer to
 the first question has been sent to the page as a POST variable, then, in
 the new version of the page, the "Alexandria" radio button will be selected
 ("checked").(This makes the form "sticky." In other words, it ensures that
 choices made by a user will remain visible on the computer screen even after
 a new version of the page has been created by clicking on the submit button.
 In a quiz in which the user responds by typing into a "text box" a similar
 method is used to ensure that the the typed words "stick.") */

else

print '<input type="radio" name="answer1" value="a"/>Alexandria<br/>';
/*If the information that the user has selected "Alexandria" has NOT been sent
 to the page, then the an empty radio button followed by the word "Alexandria"
 is "printed." This will be the case if (1) a fresh page is being opened; 
(2) a user clicks on the submit button after having selected some other answer
 to the first question; (3) a user clicks on the submit button without having
 answered the first question. (Note that here, the "checked" attribute of the
 "input" tag is omitted.)*/

if ($_POST['answer1']=="b")
//an identical procedure is now followed for the second answer
print '<input type="radio" checked="checked" name="answer1" value="b"/>Nairobi<br/>';
else
print '<input type="radio" name="answer1" value="b"/>Nairobi<br/>';

if ($_POST['answer1']=="c")
//an identical procedure is now followed for the third answer
print '<input type="radio" checked="checked" name="answer1" value="c"/>Mombasa<br/>';
else
print '<input type="radio" name="answer1" value="c"/>Mombasa<br/>';

if ($_POST['answer1']=="d"){
print '<input type="radio" checked="checked" name="answer1" value="d"/>Cairo<br/>';
$correct++;
}
/*a similar procedure is followed for the fourth answer, but because
 this answer is the correct one, there is an important difference:
 if the condition is satisfied (if "Cairo" has been selected as the
 correct answer), then the value of the "$correct" variable is increased
 by 1. (Note that because there are two statements to be executed if
 this condition is fulfilled, they are both enclosed in "curly braces."*/
else
print '<input type="radio" name="answer1" value="d"/>Cairo<br/>';
//END OF QUESTION 1


//BEGINNING OF QUESTION 2
print '<p>(2) The capital of Honduras is</p>';

if ($_POST['answer2']=="a"){
print '<input type="radio" checked="checked" name="answer2" value="a"/>Tegucigalpa<br/>';
$correct++;
}
else
print '<input type="radio" name="answer2" value="a"/>Tegucigalpa<br/>';

if ($_POST['answer2']=="b")
print '<input type="radio" checked="checked" name="answer2" value="b"/>San Salvador<br/>';
else
print '<input type="radio" name="answer2" value="b"/>San Salvador<br/>';

if ($_POST['answer2']=="c")
print '<input type="radio" checked="checked" name="answer2" value="c"/>Belmopan<br/>';
else
print '<input type="radio" name="answer2" value="c"/>Belmopan<br/>';


if ($_POST['answer2']=="d")
print '<input type="radio" checked="checked" name="answer2" value="d"/>Mazatenango<br/>';
else
print '<input type="radio" name="answer2" value="d"/>Mazatenango<br/><br/>';
//END OF QUESTION 2


//BEGINNING OF QUESTION 3
print '<p>(3) The capital of Cambodia is</p>';

if ($_POST['answer3']=="a")
print '<input type="radio" checked="checked" name="answer3" value="a"/>Kuala Lumpur<br/>';
else
print '<input type="radio" name="answer3" value="a"/>Kuala Lumpur<br/>';

if ($_POST['answer3']=="b"){
print '<input type="radio" checked="checked" name="answer3" value="b"/>Phnom Penh<br/>';
$correct++;
}
else
print '<input type="radio" name="answer3" value="b"/>Phnom Penh<br/>';

if ($_POST['answer3']=="c")
print '<input type="radio" checked="checked" name="answer3" value="c"/>Bangkok<br/>';
else
print '<input type="radio" name="answer3" value="c"/>Bangkok<br/>';


if ($_POST['answer3']=="d")
print '<input type="radio" checked="checked" name="answer3" value="d"/>Saigon<br/><br/>';
else
print '<input type="radio" name="answer3" value="d"/>Saigon<br/><br/>';
//END OF QUESTION 3

/*The next line begins a "foreach loop." The loop checks, in turn, each
 of the the three elements of the $_POST array ($_POST['answer1'],
 $_POST['answer2'], $_POST['answer3']. ("Arrays" are a special type
 of variable which contain other variables as their "elements.") It uses
 the "isset()" "function" on each of these to determine whether or not
 a user has "set" it by clicking on the associated radio button. Whenever
 the loop finds an array member that has been set it increases the value
 of the variable $done by 1.*/

foreach ($_POST as $value){
if (isset ($value)){
$done++;
}
}

/*The following conditional ensures that the "submit" ("check answers")
 button appears when and only when the quiz has not been completed (i.e.
 when a fresh quiz appears or when the user has clicked the submit button
 without answering all three questions).Logically, because there are three
 questions, "!=3" would be expected here. I do not really understand why
 "4" is necessary. (It presumably has something to do with the fact that
 the first element of an array is automatically "indexed" at "0".) */
if ($done !=4)
print '<input type="submit" name="submit" value="check answers" /><br/><br/>';


if (($done > 0)&&($done < 4))

/*There are two conditions here: the first ensures that the following print
 statement is not executed when a fresh quiz appears and the second that it
 does not appear when all the questions have been answered. I can't
 confidentally explain why the first condition is necessary. However, when
 it is removed the print statement appears, absurdly, at the bottom of a fresh
 quiz. This is presumably because when a fresh quiz is opened the script runs
 even though the submit button has not been clicked and the  "$done" variable
 is automatically given the value "0".  */
print 'You haven&#8217;t answered all the questions. Please finish the quiz and re-submit your answers.';

if($done==4){

if ($correct==0)
/*without this nested conditional when a user answers none of the questions
 correctly the score is given as "/3" instead of "0/3".*/
$correct="0";
print "Your score is $correct/3.<br/><br/>";

print 'The correct answers: (1) Cairo&nbsp;&nbsp; (2) Tegucigalpa&nbsp;&nbsp; (3) Phnom Penh';

}
print '</form>';
//the "form" is finally closed and, in the next line, the php section is ended

?>
    </body>
</html>

