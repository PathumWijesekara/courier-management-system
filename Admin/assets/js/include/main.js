/*.............................................................. Grid View ..............................................................*/

window.addEventListener("DOMContentLoaded", (event) => {
  // Simple-DataTables
  // https://github.com/fiduswriter/Simple-DataTables/wiki

  const datatablesSimple = document.getElementById("datatablesSimple");
  if (datatablesSimple) {
    new simpleDatatables.DataTable(datatablesSimple);
  }
});

/*.............................................................. Settings Data..............................................................*/

//settings

calculationAdmin = (ele) => {
  var send_location = document.getElementById("send_location").value;
  var end_location = document.getElementById(ele.id).value;
  var weight = document.getElementById("weight").value;

  var data = {
    send_location: send_location,
    end_location: end_location,
  };

  if (weight.trim() != "") {
    $.ajax({
      method: "POST",
      url: "../server/api.php?function_code=checkArea",
      data: data,
      success: function ($data) {
        console.log($data);

        if ($data > 0) {
          var sum = parseInt(weight) * parseInt($data);
          document.getElementById("total").value = sum;
          document.getElementById("total_fee").value = sum;
        } else {
          errorMessage_R("this area not in our service area");
        }
      },
      error: function (error) {
        console.log(`Error ${error}`);
      },
    });
  } else {
    errorMessage_R("Please enter Weight");
  }
};

addRequestAdmin = (form) => {
  var formData = new FormData(form);

  if (formData.get("sender_phone").trim() != "") {
    if (formData.get("weight").trim() != "") {
      if (formData.get("total_fee").trim() != "") {
        if (formData.get("res_phone").trim() != "") {
          if (formData.get("red_address").trim() != "") {
            $.ajax({
              method: "POST",
              url: "../server/api.php?function_code=addRequest",
              data: formData,
              success: function ($data) {
                console.log($data);
                successToastRedirect("courier.php");
              },
              cache: false,
              contentType: false,
              processData: false,
              error: function (error) {
                console.log(`Error ${error}`);
              },
            });
          } else {
            errorMessage("Please Enter Recever Address");
          }
        } else {
          errorMessage("Please Enter Recever Phone Number");
        }
      } else {
        errorMessage("Please Enter Locations to get Price");
      }
    } else {
      errorMessage("Please Enter Parcel Weight");
    }
  } else {
    errorMessage("Please Enter Your Phone Number");
  }
};

upImage = (cat_id) => {
  $("#formFile" + cat_id)[0].click();
};

settingsUpdate = (ele, field) => {
  var val = document.getElementById(ele.id).value;

  var data = {
    field: field,
    value: val,
  };

  $.ajax({
    method: "POST",
    url: "../server/api.php?function_code=changesettings",
    data: data,
    success: function ($data) {
      console.log($data);
      successToast();
    },
    error: function (error) {
      console.log(`Error ${error}`);
    },
  });
};

/*.............................................................. Login..............................................................*/

login = (myForm) => {
  var formData = new FormData(myForm);

  $.ajax({
    method: "POST",
    url: "../server/api.php?function_code=login",
    data: formData,
    success: function ($data) {
      console.log($data);
      if ($data == "admin") {
        window.location.href = "index.php";
      } else if ($data == "customer") {
        window.location.href = "../index.php";
      } else {
        iziToast.error({
          timeout: 2000,
          title: "Error",
          message: "Email or Password is Wrong",
        });
      }
    },
    cache: false,
    contentType: false,
    processData: false,
    error: function (error) {
      console.log(`Error ${error}`);
    },
  });
};

/*.............................................................. Update Data..............................................................*/

updateData = (ele, id, field, table, id_fild) => {
  var itemid = ele.id;
  var val = document.getElementById(ele.id).value;

  var data = {
    id_fild: id_fild,
    id: id,
    field: field,
    value: val,
    table: table,
  };

  if (field == "email") {
    if (emailvalidation(val)) {
      callUpdateRequest(data);
    }
  } else if (field == "phone") {
    if (phonenumber(val)) {
      callUpdateRequest(data);
    }
  } else {
    callUpdateRequest(data);
  }
};

callUpdateRequest = (data) => {
  $.ajax({
    method: "POST",
    url: "../server/api.php?function_code=updateData",
    data: data,
    success: function ($data) {
      console.log($data);
      successToast();
    },
    error: function (error) {
      console.log(`Error ${error}`);
    },
  });
};

//change password

changePasswordAdmin = (form) => {
  var formData = new FormData(form);

  if (formData.get("current_password").trim() != "") {
    if (formData.get("new_password").trim() != "") {
      if (formData.get("confirm_new_password").trim() != "") {
        if (
          formData.get("new_password") === formData.get("confirm_new_password")
        ) {
          if (
            checkPasswordAdmin(
              formData.get("current_password"),
              formData.get("email")
            ) > 0
          ) {
            var data = {
              id: formData.get("email"),
              field: "password",
              value: formData.get("new_password"),
              id_fild: "email",
              table: "employee",
            };

            $.ajax({
              method: "POST",
              url: "../server/api.php?function_code=updateData",
              data: data,
              success: function ($data) {
                console.log($data);
                successToastwithLogoutInAdmin();
              },
              error: function (error) {
                console.log(`Error ${error}`);
              },
            });
          } else {
            errorMessage("Current Password is Wrong");
          }
        } else {
          errorMessage("Password is Not Match!");
        }
      } else {
        errorMessage("Please Enter Phone Number");
      }
    } else {
      errorMessage("Please Enter New Password");
    }
  } else {
    errorMessage("Please Enter Current Password");
  }
};

checkPasswordAdmin = (password, email) => {
  const data = {
    password: password,
    email: email,
  };
  var values;
  $.ajax({
    method: "POST",
    url: "../server/api.php?function_code=checkPasswordByEmail",
    data: data,
    async: false,
    success: function (data) {
      values = data;
      console.log(data);
    },

    error: function (error) {
      console.log(`Error ${error}`);
    },
  });
  return values;
};
