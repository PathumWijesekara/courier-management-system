permenantdeleteData = (id, table, id_fild) => {
  Swal.fire({
    title: "Are you sure? this recode will delete permenantly",
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
        url: "../server/api.php?function_code=permanantDeleteData",
        data: data,
        success: function ($data) {
          console.log($data);
          successToastDelete();
        },
        error: function (error) {
          console.log(`Error ${error}`);
        },
      });
      Swal.fire("Deleted!", "Your file has been deleted.", "success");
    }
  });
};

deleteData = (id, table, id_fild) => {
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

      callDeleteRequest(data);
    }
  });
};
