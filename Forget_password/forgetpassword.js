function uploadform() {
    const format = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    let validation = true
    const username = document.getElementById('username').value
    const password = document.getElementById('password').value
    const confirm_password = document.getElementById('confirm_password').value

    const error = document.getElementsByClassName('error')

    if (username !== "") {
        if (username.length < 6 || username.length >= 15) {
            error[0].innerHTML = "username length min = 6 and max = 15.";
            validation = false
        } else {
            error[0].innerHTML = ""
        }

    } else {
        error[0].innerHTML = "please fill the username."
        validation = false
    }

    if (password !== "") {
        if (!format.test(password)) {
            error[1].innerHTML = "Password must be contain special character."
            validation = false
        }
        else {
            error[1].innerHTML = ""
        }
    } else {
        error[1].innerHTML = "Please fll the password filled."
        validation = false
    }

    if (confirm_password !== "") {
console.log("error")
        if (confirm_password !== password) {
            error[2].innerHTML = "confirm password not match to the password."
            validation = false
        } else {
            error[2].innerHTML = ""
        }
    } else {
        error[2].innerHTML = "Please fill the place"
            validation = false
    }
    if (!validation) {
        return false
    }
    else {
        return true
    }
}