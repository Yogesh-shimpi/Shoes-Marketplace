function uploadform() {
    let validation = true;

    const username = document.getElementById('username').value
    const description = document.getElementById('description').value
    const email = document.getElementById('email').value
    const mobile_no = document.getElementById('mobile').value

    console.log(username + description + email + mobile_no)

    const error = document.getElementsByClassName('error')

    if (username !== "") {
        if (username.length <= 6 || username.length >= 15) {
            error[0].innerHTML = "username length min = 6 and max = 15.";
            validation = false
        } else {
            error[0].innerHTML = ""
        }

    } else { error[0].innerHTML = "please fill the username." }

    if (mobile_no !== "") {
        if(!isNaN(mobile_no)){
            if (mobile_no.length !== 10) {
                error[1].innerHTML = "Only 10 digit are accepted"
                validation = false
            }
            else {
                error[1].innerHTML = ""
            }
        }else{
            error[1].innerHTML = "only number are accepted"
        }
    } else {
        error[1].innerHTML = "Please fill the mobiel no."
        validation = false
    }
    if (email === "") {
        error[2].innerHTML = "please fill the space"
        validation = false
    }else{
        error[2].innerHTML = ""
    }
    if (description === "") {
        error[3].innerHTML = "please fill the address"
        validation = false

    }else{
        error[3].innerHTML = ""}
    if (!validation) {
        return false
    } else {
        return true
    }
}
document.getElementById('alert').addEventListener('click',()=>{
       let alert_choose = confirm("Please login to contact us, Click on aok to login")
       if(alert_choose){
        window.location.href = "../Sign in/Sign_in.php"
       }
})