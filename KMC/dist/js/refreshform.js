$(document).ready(function() {
$("#submit").click(function() {
var id = $("#id").val();
var name = $("#name").val();
var username = $("#username").val();
var email = $("#email").val();
var password = $("#password").val();
var contactnumber = $("#contactnumber").val();
var streetaddress = $("#email").val();
var city = $("#contact").val();
var role = $("#username").val();
var password = $("#msg").val();


if (id == '' || name == '' || username == '' || email == '' || password == '') {
alert("Insertion Failed Some Fields are Blank....!!");
} else {
// Returns successful data submission message when the entered information is stored in database.
$.post("Update_Delete_User.php", {
id1: id,
name1: name,
username1: username,
email1: email,
password1: password,
contactnumber1: contactnumber,
streetaddress1: streetaddress,
city1: city,
role1: role

}, function(data) {
alert(data);
$('#form')[0].reset(); // To reset form fields
});
}
});
});// JavaScript Document