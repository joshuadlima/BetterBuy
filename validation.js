let myInput=document.getElementById('pswrd1');
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

console.log(myInput);
let count;
  myInput.onkeyup = function() {
    // Validate lowercase letters
    count=0;
    var lowerCaseLetters = /[a-z]/g;
    if(myInput.value.match(lowerCaseLetters)) {  
      letter.classList.remove("invalid");
      letter.classList.add("valid");
      count++;
    } else {
      letter.classList.remove("valid");
      letter.classList.add("invalid");
    }
    
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {  
      capital.classList.remove("invalid");
      capital.classList.add("valid");
      count++;
    } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
    }
  
    // Validate numbers
    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {  
      number.classList.remove("invalid");
      number.classList.add("valid");
      count++;
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }
    
    // Validate length
    if(myInput.value.length >= 8) {
      length.classList.remove("invalid");
      length.classList.add("valid");
      count++;
    } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
console.log(count);
  }



  /* Checking if passwords match */
let myInput2=document.getElementById("pswrd2");
console.log(myInput2);


myInput2.onkeyup = function() 
{
if(myInput.value==myInput2.value&&myInput.value!="")
{
document.getElementById("match-password-message").innerHTML="The passwords match";
document.getElementById("match-password-message").style.color="green";
document.getElementById("signup").innerHTML='<input type="submit" value="SIGN UP" class="btn" id="signup"/>';
document.getElementById("match-password-message").classList.add('valid');
document.getElementById("match-password-message").classList.remove('invalid');
///.style.cursor="not-allowed";
if(count==4)
{
 
  document.getElementById("signup").style.cursor="allowed";
  document.getElementById("signup").outerHTML='<input type="submit" value="SIGN UP" class="btn" id="signup"/>';
}
else
{

  document.getElementById("signup").style.cursor="not-allowed";
  document.getElementById("signup").outerHTML='<input type="submit" value="SIGN UP" class="btn" id="signup" disabled />';
}
}
else
{
    document.getElementById("match-password-message").innerHTML="The passwords do not match";
    document.getElementById("match-password-message").style.color="red";
    document.getElementById("signup").outerHTML='<input type="submit" value="SIGN UP" class="btn" id="signup" disabled />';
    document.getElementById("signup").style.cursor="not-allowed"; 
    document.getElementById("match-password-message").classList.remove('valid');
document.getElementById("match-password-message").classList.add('invalid');   
}
}