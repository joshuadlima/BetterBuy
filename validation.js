let myInput=document.getElementById('pswrd1');
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

console.log(myInput);
//myInput.onfocus = function() {
 //   document.getElementById("message").style.display = "block";
  //}
  
  // When the user clicks outside of the password field, hide the message box
  //myInput.onblur = function() {
   // document.getElementById("message").style.display = "none";
//}


// When the user clicks on the password field, show the message box
//myInput.onfocus = function() {
  //  document.getElementById("message").style.display = "block";
  //}
  
  // When the user clicks outside of the password field, hide the message box
 // myInput.onblur = function() {
   // document.getElementById("message").style.display = "none";
  //}
  
  // When the user starts to type something inside the password field
  myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(myInput.value.match(lowerCaseLetters)) {  
      letter.classList.remove("invalid");
      letter.classList.add("valid");
    } else {
      letter.classList.remove("valid");
      letter.classList.add("invalid");
    }
    
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {  
      capital.classList.remove("invalid");
      capital.classList.add("valid");
    } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
    }
  
    // Validate numbers
    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {  
      number.classList.remove("invalid");
      number.classList.add("valid");
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }
    
    // Validate length
    if(myInput.value.length >= 8) {
      length.classList.remove("invalid");
      length.classList.add("valid");
    } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
  }



  /* Checking if passwords match */
  let myInput2=document.getElementById("pswrd2");
  console.log(myInput2);
 // myInput2.onfocus = function() {
  //  document.getElementById("match-password-message").style.display = "flex";
  //}
  
  // When the user clicks outside of the password field, hide the message box
  //myInput2.onblur = function() {
    //document.getElementById("match-password-message").style.display = "none";
//}


/* Setting default values for button */
document.getElementById("signup").style.cursor="not-allowed";
document.getElementById("signup").style.opacity="0.6";



myInput2.onkeyup = function() 
{
if(myInput.value===myInput2.value&&myInput.value!="")
{
document.getElementById("match-password-message").innerHTML="The passwords match";
document.getElementById("match-password-message").style.color="green";

///.style.cursor="not-allowed";
}
else{
    document.getElementById("match-password-message").innerHTML="The passwords do not match";
    document.getElementById("match-password-message").style.color="red";
        
}
}