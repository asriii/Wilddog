
$(document).ready(function() {
  
    $('#submitAdd').on("click",function(){
        if($("#action").val() == "ADD"){
            saveCustomer();
        } else {
            updateCustomer($("#custom_id").val());
        }
    });

    $('#btnAdd').on("click", function(){
        $('#customerModal').modal("show")
        $('#action').val("ADD");
    })
} );


function saveCustomer(){
    var req = {
        firstname: $("#firstname").val(),
        lastname: $("#lastname").val(),
        phoneno: $("#phomeno").val(),
        email: $("#email").val(),
        address: $("#address").val(),
    }
    $.ajax({
        url: "/addCustomer",
        type: "post",
        data: req ,
        success: function (response) {
            window.location.reload();
           // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}

function updateCustomer(id){
    var req = {
        firstname: $("#firstname").val(),
        lastname: $("#lastname").val(),
        phoneno: $("#phomeno").val(),
        email: $("#email").val(),
        address: $("#address").val(),
    }
    $.ajax({
        url: "/updateCustomer/" + id,
        type: "post",
        data: req ,
        success: function (response) {
            window.location.reload();
           // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}


function getEditCustomer(id){
   
    $.ajax({
        url: "/getCustomer/" + id,
        type: "get",
        success: function (response) {
            console.log("getCustomer response : ", response);
            $('#customerModal').modal("show")
            $('#action').val("EDIT");
            $("#custom_id").val(response[0].id);
            $("#firstname").val(response[0].firstname);
            $("#lastname").val(response[0].lastname);
            $("#phomeno").val(response[0].phoneno);
            $("#email").val(response[0].email);
            $("#address").val(response[0].address);
        },
        error: function(error) {
           console.log(error);
        }
    });
}

function confirmDeleteCustomer(id){
    Swal.fire({
        title: 'confirm delete?',
        showCancelButton: true,
        confirmButtonText: `delete`,
        denyButtonText: `cancel`,
      }).then((result) => {
        if (result.isConfirmed) {
            console.log("Y")
            deleteCustomer(id)
        }
      })
}

function deleteCustomer(id){
    $.ajax({
        url: "/deleteCustomer/" + id,
        type: "get",
        success: function (response) {
            window.location.reload();
           // You will get response from your PHP page (what you echo or print)
        },
        error: function(error) {
           console.log(error);
        }
    });
}