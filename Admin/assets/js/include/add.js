insertImage = (ele) => {
  var formData = new FormData(ele);

  $.ajax({
    method: "POST",
    url: "../server/api.php?function_code=insertImageUpload",
    data: formData,
    success: function ($data) {
      console.log($data);
      loading("Image Uploding...");
    },
    cache: false,
    contentType: false,
    processData: false,
    error: function (error) {
      console.log(`Error ${error}`);
    },
  });
};

addBranch = (form) => {
  let fd = new FormData(form);

  if (fd.get("branch_name").trim() != "") {
    $.ajax({
      method: "POST",
      url: "../server/api.php?function_code=addBranch",
      data: fd,
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
    errorMessage("Please Enter Branch Name");
  }
};

addArea = (form) => {
  let fd = new FormData(form);

  if (fd.get("area_name").trim() != "") {
    $.ajax({
      method: "POST",
      url: "../server/api.php?function_code=addArea",
      data: fd,
      success: function ($data) {
        if ($data > 0) {
          errorMessage("This Area Already Here..");
        } else {
          successToast();
        }
      },
      cache: false,
      contentType: false,
      processData: false,
      error: function (error) {
        console.log(`Error ${error}`);
      },
    });
  } else {
    errorMessage("Please Enter Area Name");
  }
};

addPrice = (form) => {
  let fd = new FormData(form);

  if (fd.get("start_area").trim() != "") {
    if (fd.get("end_area").trim() != "") {
      if (fd.get("price").trim() != "") {
        $.ajax({
          method: "POST",
          url: "../server/api.php?function_code=addPrice",
          data: fd,
          success: function ($data) {
            console.log($data);
            if ($data > 0) {
              normalAlertNoReload("error", "This Price is Alrady Here..");
            } else {
              successToast();
            }
          },
          cache: false,
          contentType: false,
          processData: false,
          error: function (error) {
            console.log(`Error ${error}`);
          },
        });
      } else {
        errorMessage("Please Enter Price");
      }
    } else {
      errorMessage("Please Enter End Area");
    }
  } else {
    errorMessage("Please Enter Start Area");
  }
};

addCustomer = (form) => {
  let fd = new FormData(form);

  if (fd.get("name").trim() != "") {
    if (fd.get("email").trim() != "") {
      if (fd.get("phone").trim() != "") {
        if (fd.get("nic").trim() != "") {
          if (fd.get("address").trim() != "") {
            if (fd.get("password").trim() != "") {
              if (fd.get("conf_password").trim() != "") {
                if (fd.get("password") == fd.get("conf_password")) {
                  if (emailvalidation(fd.get("email"))) {
                    if (phonenumber(fd.get("phone"))) {
                      $.ajax({
                        method: "POST",
                        url: "../server/api.php?function_code=addCustomer",
                        data: fd,
                        success: function ($data) {
                          console.log($data);

                          if ($data > 0) {
                            errorMessage("This Customer Already Registerd!");
                          } else {
                            successToastRedirect("login.php");
                          }
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        error: function (error) {
                          console.log(`Error ${error}`);
                        },
                      });
                    }
                  }
                } else {
                  errorMessage("Password is Not Match");
                }
              } else {
                errorMessage("Please Confirm Password");
              }
            } else {
              errorMessage("Please Enter Password");
            }
          } else {
            errorMessage("Please Enter Address");
          }
        } else {
          errorMessage("Please Enter NIC");
        }
      } else {
        errorMessage("Please Enter Phone number");
      }
    } else {
      errorMessage("Please Enter Email");
    }
  } else {
    errorMessage("Please Enter Full Name");
  }
};

addCustomerAdmin = (form) => {
  let fd = new FormData(form);

  if (fd.get("name").trim() != "") {
    if (fd.get("email").trim() != "") {
      if (fd.get("phone").trim() != "") {
        if (fd.get("nic").trim() != "") {
          if (fd.get("address").trim() != "") {
            if (fd.get("password").trim() != "") {
              if (fd.get("conf_password").trim() != "") {
                if (fd.get("password") == fd.get("conf_password")) {
                  if (emailvalidation(fd.get("email"))) {
                    if (phonenumber(fd.get("phone"))) {
                      $.ajax({
                        method: "POST",
                        url: "../server/api.php?function_code=addCustomer",
                        data: fd,
                        success: function ($data) {
                          console.log($data);

                          if ($data > 0) {
                            errorMessage("This Customer Already Registerd!");
                          } else {
                            successToastRedirect("add_request.php");
                          }
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        error: function (error) {
                          console.log(`Error ${error}`);
                        },
                      });
                    }
                  }
                } else {
                  errorMessage("Password is Not Match");
                }
              } else {
                errorMessage("Please Confirm Password");
              }
            } else {
              errorMessage("Please Enter Password");
            }
          } else {
            errorMessage("Please Enter Address");
          }
        } else {
          errorMessage("Please Enter NIC");
        }
      } else {
        errorMessage("Please Enter Phone number");
      }
    } else {
      errorMessage("Please Enter Email");
    }
  } else {
    errorMessage("Please Enter Full Name");
  }
};

addEmployee = (form) => {
  let fd = new FormData(form);

  if (fd.get("name").trim() != "") {
    if (fd.get("email").trim() != "") {
      if (fd.get("phone").trim() != "") {
        if (fd.get("nic").trim() != "") {
          if (fd.get("address").trim() != "") {
            if (fd.get("password").trim() != "") {
              if (fd.get("conf_password").trim() != "") {
                if (fd.get("password") == fd.get("conf_password")) {
                  if (emailvalidation(fd.get("email"))) {
                    if (phonenumber(fd.get("phone"))) {
                      $.ajax({
                        method: "POST",
                        url: "../server/api.php?function_code=addEmployee",
                        data: fd,
                        success: function ($data) {
                          console.log($data);

                          if ($data > 0) {
                            errorMessage("This Email Already Registerd!");
                          } else {
                            successToast();
                          }
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        error: function (error) {
                          console.log(`Error ${error}`);
                        },
                      });
                    }
                  }
                } else {
                  errorMessage("Password is Not Match");
                }
              } else {
                errorMessage("Please Confirm Password");
              }
            } else {
              errorMessage("Please Enter Password");
            }
          } else {
            errorMessage("Please Enter Address");
          }
        } else {
          errorMessage("Please Enter NIC");
        }
      } else {
        errorMessage("Please Enter Phone number");
      }
    } else {
      errorMessage("Please Enter Email");
    }
  } else {
    errorMessage("Please Enter Full Name");
  }
};
