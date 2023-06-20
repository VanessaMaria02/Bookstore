$(document).ready(function(){
    ajaxHandler("getAllUser", "", displayUser);
    
    $("#myTable").on("click", ".btn-secondary", function(){
        console.log("click");
        var id = $(this).closest("tr").attr("id");
        location.replace("./person.php?id="+id);
    });

    $("#seachfield").on("input", function(e){
        $("#myTable").hide();
        $("#myTable").empty();
        ajaxHandler("AllUserName", $("#seachfield").val(), displayUser);
        $("#myTable").show();
    });
})

function displayUser(users){
    console.log(users);
    let userRole = "Fehler";
    users.forEach(element =>{
        if(element.urole == 0){
            userRole = "User";
        }else if(element.urole == 1){
            userRole = "Admin";
        }else if(element.urole == 2){
            userRole = "inaktiv";
        }
        $("#myTable").append("<tr id ='"+element.uid+"'><td style='text-align:center;'>"
        +element.uid+
        "</th><td>"
        +element.uname+
        "</td><td>"
        +userRole+
        "</td><td><button id = 'choose' class='btn btn-secondary'>select</button></td></tr>");
    });
}

function ajaxHandler(method, searchterm, nextFunc = ()=>{}){

    $.ajax({
        type: "GET",
        url: "../Backend/serviceHandler.php",
        cache: false,
        data:{method: method, param: searchterm},
        dataType: "json",
        success: function(response){
            console.log(response);
            nextFunc(response);
        },
        error: function(xhr){
            console.log(xhr);
            alert('Error, ein Problem ist aufgetreten. Überprüfen Sie ihre Eingaben. '+xhr.responseText);
        }
    });
}




