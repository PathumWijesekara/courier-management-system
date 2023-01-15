uploadImage = (ele) => {
  var formData = new FormData(ele);

  $.ajax({
    method: "POST",
    url: "../server/api.php?function_code=imageUploadCategory",

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

uploadSettingImage = (ele) => {
  var formData = new FormData(ele);

  $.ajax({
    method: "POST",
    url: "../server/api.php?function_code=SettingImage",
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
