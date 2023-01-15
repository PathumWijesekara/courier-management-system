addContactMessage = (form) => {
  var formData = new FormData(form);

  if (formData.get("name").trim() != "") {
    if (formData.get("email").trim() != "") {
      if (formData.get("subject").trim() != "") {
        if (formData.get("message").trim() != "") {
          $.ajax({
            method: "POST",
            url: "server/api.php?function_code=addcontact",
            data: formData,
            success: function ($data) {
              console.log($data);
              successToast();
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function (error) {
              console.log(`Error ${error}`);
            },
          });
        } else {
          errorMessage("Please Enter Message");
        }
      } else {
        errorMessage("Please Enter Phone Number");
      }
    } else {
      errorMessage("Please Enter Email Address");
    }
  } else {
    errorMessage("Please Enter Your Name");
  }
};

addRequest = (form) => {
  var formData = new FormData(form);

  if (formData.get("sender_phone").trim() != "") {
    if (formData.get("weight").trim() != "") {
      if (formData.get("total_fee").trim() != "") {
        if (formData.get("res_phone").trim() != "") {
          if (formData.get("red_address").trim() != "") {
            $.ajax({
              method: "POST",
              url: "server/api.php?function_code=addRequest",
              data: formData,
              success: function ($data) {
                console.log($data);
                successToastRedirect("tracking.php");
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

calculation = (ele) => {
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
      url: "server/api.php?function_code=checkArea",
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

//profile changers

changeEmail = (form) => {
  var formData = new FormData(form);

  if (formData.get("current_email").trim() != "") {
    if (formData.get("new_email").trim() != "") {
      if (
        checkEmail(formData.get("current_email"), formData.get("customer_id")) >
        0
      ) {
        var data = {
          id: formData.get("customer_id"),
          field: "email",
          value: formData.get("new_email"),
          id_fild: "customer_id",
          table: "customer",
        };

        $.ajax({
          method: "POST",
          url: "server/api.php?function_code=updateData",
          data: data,
          success: function ($data) {
            console.log($data);
            successToastwithLogout();
          },
          error: function (error) {
            console.log(`Error ${error}`);
          },
        });
      } else {
        errorMessage("Current Emaiil is Wrong!");
      }
    } else {
      errorMessage("Please Enter Email Address");
    }
  } else {
    errorMessage("Please Enter Your Name");
  }
};

changePassword = (form) => {
  var formData = new FormData(form);

  if (formData.get("current_password").trim() != "") {
    if (formData.get("new_password").trim() != "") {
      if (formData.get("confirm_new_password").trim() != "") {
        if (
          formData.get("new_password") === formData.get("confirm_new_password")
        ) {
          if (
            checkPassword(
              formData.get("current_password"),
              formData.get("customer_id")
            ) > 0
          ) {
            var data = {
              id: formData.get("customer_id"),
              field: "password",
              value: formData.get("new_password"),
              id_fild: "customer_id",
              table: "customer",
            };

            $.ajax({
              method: "POST",
              url: "server/api.php?function_code=updateData",
              data: data,
              success: function ($data) {
                console.log($data);
                successToastwithLogout();
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

checkPassword = (password, customer_id) => {
  const data = {
    password: password,
    customer_id: customer_id,
  };
  var values;
  $.ajax({
    method: "POST",
    url: "server/api.php?function_code=checkPassword",
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

function checkEmail(email, customer_id) {
  const data = {
    email: email,
    customer_id: customer_id,
  };
  var values;

  $.ajax({
    method: "POST",
    url: "server/api.php?function_code=checkEmail",
    data: data,
    async: false,
    success: function (data) {
      console.log(data);
      values = data;
    },
    error: function (error) {
      console.log(`Error ${error}`);
    },
  });

  return values;
}

updateDataFromHome = (ele, id, field, table, id_fild) => {
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
      callUpdateRequestFromHome(data);
    }
  } else if (field == "phone") {
    if (phonenumber(val)) {
      callUpdateRequestFromHome(data);
    }
  } else {
    callUpdateRequestFromHome(data);
  }
};

deleteDataFromHome = (id, table, id_fild) => {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var data = {
        id: id,
        table: table,
        id_fild: id_fild,
      };

      console.log(data);

      $.ajax({
        method: "POST",
        url: "server/api.php?function_code=deleteData",
        data: data,
        success: function ($data) {
          console.log($data);
          successToastwithLogout();
        },
        error: function (error) {
          console.log(`Error ${error}`);
        },
      });
      Swal.fire("Deleted!", "Your file has been deleted.", "success");
    }
  });
};
