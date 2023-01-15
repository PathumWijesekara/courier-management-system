function phonenumber(inputtxt) {
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    if (inputtxt.match(phoneno)) {
        return true;
    } else {
        errorMessage_R("Phone Number is not valid. please Enter valid Phone Number");
        return false;
    }
}
function emailvalidation(inputtxt) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (inputtxt.match(mailformat)) {
        return true;
    } else {
        errorMessage_R("Email is not valid. please Enter valid Email");
        return false;
    }
}
