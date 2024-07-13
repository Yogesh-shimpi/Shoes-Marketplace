
const text_change = document.getElementById('floatingTextarea')
text_change.addEventListener('input', () => {
    document.getElementById('add_label').innerHTML = text_change.value.length
})  
function full_name() {
    const first_name = document.getElementById('firstname').value
    if (first_name === "") {
        console.log('he')
        document.getElementById('first_error').innerHTML = "inavlis"
    }
}
document.getElementById('image').addEventListener('input', () => {
    let image = document.getElementById('image')
    document.getElementById('user_profile').src = URL.createObjectURL(image.files[0]);
})

function uploadform() {
    const format = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    let validation = true

    const image = document.getElementById('image').files[0]
    const username = document.getElementById('username').value
    const fullname = document.getElementById('fullname').value
    const age = document.getElementById('age').value
    const gender = document.getElementsByName('gender').value
    const DOB = document.getElementById('DOB').value
    const DOP = document.getElementById('DOP').value
    const floatingTextarea = document.getElementById('floatingTextarea').value
    const email = document.getElementById('email').value
    const mobile_no = document.getElementById('mobile_no').value
    const password = document.getElementById('password').value
    const confirm_password = document.getElementById('confirm_password').value

    const error = document.getElementsByClassName('error')

    if (!image) {
        error[0].innerHTML = "please select valid image."
        validation = false
    } else {
        let type = image.type
        console.log(type)
        let validtype = ["image/jpeg", "image/png", "image/webp", "image/jpg", "image/gif"]
        if (!validtype.includes(type)) {
            error[0].innerHTML = "Get valid image format png , jpeg , jpg , gif."
            validation = false
        }else{
            error[0].innerHTML = ""
        }
    }

    if (username !== "") {
        if (username.length <= 6 || username.length >= 15) {
            error[1].innerHTML = "username length min = 6 and max = 15.";
            validation = false
        }else{
            error[1].innerHTML = ""
        }

    }else{ error[1].innerHTML = "please fill the username."
            validation = false}
    
    if(fullname !== ""){
        if(!isNaN(fullname)){
            error[2].innerHTML = "please do not enter any number"
            validation = false
        }else{
            error[2].innerHTML = ""
        }
    }else{
        
        error[2].innerHTML = "Please fill the your full name"
        validation = false
    }

    if(age !== ""){
        if(age >= 0 && age <= 150){
            if(isNaN(age)){
                error[3] = "Please enter only number."
                validation = false
            }
            else{
                error[3].innerHTML = ""
            }
    
        }else{
            error[3].innerHTML= "Please Enter the valid age.";
            validation = false}
    }
    else{
        error[3].innerHTML = "Please enter the age."
                validation = false
    }

    if(DOB !== ""){
        let birthdate = new Date(DOB)
        let date = new Date()
        if(birthdate.toDateString() >= date.toDateString()){
            validation = false
            
            error[5].innerHTML = "please enter the valid date."
        }else{
            error[5].innerHTML = ""
        }
    }else{
        error[5].innerHTML = "please enter the Date of birth"
                validation = false
        }
   
        if(DOP === ""){
            error[6].innerHTML = "please fill the place."
        validation = false
        }
        if(floatingTextarea === ""){
            error[7].innerHTML     = "please fill the address"
            validation = false

        }
        if(email ===""){
            error[8].innerHTML = "please fill the space"
            validation = false
        }
        if(mobile_no !==""){
            if(mobile_no.length !== 10){
                error[9].innerHTML = "Enter the 10 digit mobile no."
            validation = false
            }
            else{
                error[9].innerHTML = ""
            }
        }else{
            error[9].innerHTML = "Only 10 digit are accepted"
            validation = false
        }
        console.log(password    )
        if(password !== "" ){
            if(!format.test(password)){
                error[10].innerHTML = "Password must be contain special character."
            validation = false
            }
            else{
                error[10].innerHTML = ""
            }
        }else{
            error[10].innerHTML = "Please fll the password ."
            validation = false
        }
        if(confirm_password !== ""){
            
        if(confirm_password !== password){
            error[11].innerHTML = "confirm password not match to the password."
            validation = false
        }else{
            error[11].innerHTML = ""
        }
        }else{
            error[11].innerHTML = "Please fill the confirm password"
            validation = false
        }
        if(!validation){
            return false
        }
        else{
            return true
        }
    }