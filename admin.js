function adminlogin(){
    Email = document.getElementById("loginEmail").value;
    Pwd = document.getElementById("loginPwd").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if( this.readyState == 4 && this.status == 200){
            if(this.responseText == "true"){
                location.href = "index.php";
            }
            else{
                alert(this.responseText);
            }
        }
    }
    xmlhttp.open("GET","api/login.php?Email="+Email+"&Password="+Pwd,true);
    xmlhttp.send();
}
function setActive(title){
    document.getElementById(title).classList.add('active');
}
function deleteBrand(Id) {
    if (confirm("Are you sure you want to delete this Brand?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "api/ajax/deleteBrand.php", true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response) {
                        location.reload(true);
                    } else {
                        alert("Error deleting brand: " + response);
                    }
                }
            }
        };
        xhr.send("brandId=" + Id);
    }
}
function deleteVehicle(Id) {
    if (confirm("Are you sure you want to delete this Vehicle?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "api/ajax/deleteVehicle.php", true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response) {
                        location.reload(true);
                    } else {
                        alert("Error deleting vehicle: " + response);
                    }
                }
            }
        };
        xhr.send("vehicleId=" + Id);
    }
}
function deleteChatbot(Id) {
    if (confirm("Are you sure you want to delete this Question?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "api/ajax/deleteQuestion.php", true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response) {
                        location.reload(true);
                    } else {
                        alert("Error deleting question: " + response);
                    }
                }
            }
        };
        xhr.send("questionId=" + Id);
    }
}