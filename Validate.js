function Validate(){
    var username=document.getElementById('username').value;
    var password=document.getElementById('password').value;

    if(username == '' || password == ''){
        alert("You must enter both username and pasword");
        return false;
    }
    return true;
}