let password_visibility = false
let text = "text"
let password = "password"
function password_visible(){
    if(!password_visibility){
        document.getElementById('password').type = text
        document.getElementById('eye').innerHTML = "visibility"
        password_visibility = true
    }else{      
        document.getElementById('password').type = password
        document.getElementById('eye').innerHTML = "visibility_off"
        password_visibility= false
    }
}
function uploadform(){
    
    const format = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    let validation = true
    console.log('hello')
    const username = document.getElementById('username').value
    const password = document.getElementById('password').value
    const error = document.getElementsByClassName('error')
    if (username !== "") {
        if (username.length <= 6 || username.length >= 15) {
            error[0].innerHTML = "username length min = 6 and max = 15.";
            validation = false
        }else{
            error[0].innerHTML = ""
        }

    }else{ error[0].innerHTML = "please fill the username."
            validation = false}
    
            if(password !== "" ){
                if(!format.test(password)){
                    error[1].innerHTML = "Password must be contain special character."
                validation = false
                }
                else{
                    error[1].innerHTML = ""
                }
            }else{
                error[1].innerHTML = "Please fll the password filled."
                validation = false
            }
            if(!validation){
                return false
                console.log('heello')
            }
            else{
                return true
                console.log('hfello')
            }
}