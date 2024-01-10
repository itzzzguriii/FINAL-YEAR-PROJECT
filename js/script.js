function login(){
    Email = document.getElementById("loginEmail").value;
    Pwd = document.getElementById("loginPwd").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if( this.readyState == 4 && this.status == 200){
            if(this.responseText == "true"){
                location.href = "home.php";
            }
            else{
                alert(this.responseText);
            }
        }
    }
    xmlhttp.open("GET","api/login.php?Email="+Email+"&Password="+Pwd,true);
    xmlhttp.send();
}

function signup(){
    Name = document.getElementById("signupName").value;
    Email = document.getElementById("signupEmail").value;
    Password = document.getElementById("signupPwd").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if( this.readyState == 4 && this.status == 200){
            if(this.responseText == "Please fill all Fields")
            {
                alert(this.responseText);
                return;
            }
            alert(this.responseText);
            window.location.reload(true);
        }
    }
    xmlhttp.open("GET","api/signUp.php?Name="+Name+"&Email="+Email+"&Password="+Password,true);
    xmlhttp.send();
}
function setActive(title){
    document.getElementById(title).classList.add('active');
}