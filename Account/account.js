

function uploadform() {
    let validation = true

    const username = document.getElementById('username').value
    const fullname = document.getElementById('fullname').value
    const age = document.getElementById('age').value
    const DOB = document.getElementById('DOB').value
    const POB = document.getElementById('POB').value
    const address = document.getElementById('address').value
    const email = document.getElementById('email').value
    const mobile_no = document.getElementById('mobile').value

    const error = document.getElementsByClassName('error')


    if (username !== "") {
        if (username.length <= 6 || username.length >= 15) {
            error[0].innerHTML = "username length min = 6 and max = 15.";
            validation = false
        } else {
            error[0].innerHTML = ""
        }

    } else {
        error[0].innerHTML = "please fill the username."
        validation = false
    }

    if (fullname !== "") {
        if (!isNaN(fullname)) {
            error[1].innerHTML = "please do not enter any number"
            validation = false
        } else {
            error[1].innerHTML = ""
        }
    } else {

        error[1].innerHTML = "Please fill the your full name"
        validation = false
    }

    if (age !== "") {
        if (isNaN(age)) {
            error[2] = "Please enter only number."
            validation = false
        } else {
            if (age <= 0 || age >= 150) {
                error[2].innerHTML = "Please Enter the valid age.";
                validation = false
            }
            else {
                error[2].innerHTML = ""
            }

        }
    }
    else {
        error[2].innerHTML = "Please enter the age."
    }

    if (DOB !== "") {
        let birthdate = new Date(DOB)
        let date = new Date()
        if (birthdate.toDateString() >= date.toDateString()) {
            validation = false

            error[4].innerHTML = "please enter the valid date."
        } else {
            error[4].innerHTML = ""
        }
    } else {
        error[4].innerHTML = "please enter the Date of birth"
        validation = false
    }

    if (POB === "") {
        error[5].innerHTML = "please fill the place."
        validation = false
    }
    if (address === "") {
        error[6].innerHTML = "please fill the address"
        validation = false

    }
    if (email === "") {
        error[7].innerHTML = "please fill the space"
        validation = false
    }
    if (mobile_no !== "") {
        if (mobile_no.length !== 10) {
            error[8].innerHTML = "Enter the 10 digit mobile no."
            validation = false
        }
        else {
            error[8].innerHTML = ""
        }
    } else {
        error[8].innerHTML = "Only 10 digit are accepted"
        validation = false
    }
    if (!validation) {
        return false
    }
    else {
        return true
    }
}

const profile_btn = document.getElementById('profile_btn')

profile_btn.addEventListener('mouseenter', () => {
    document.getElementById('update_profile_btn').style.display = 'block'
})
profile_btn.addEventListener('mouseleave', () => {
    document.getElementById('update_profile_btn').style.display = 'none'
})
document.getElementById('image').addEventListener('input', () => {
    const imageinput = document.getElementById('image')
    let image = imageinput.files[0]

    let validation = true
    if (!image) {
        alert("please select valid image.")
        validation = false
    } else {
        let type = image.type
        console.log(type)
        let validtype = ["image/jpeg", "image/png", "image/webp", "image/jpg", "image/gif"]
        if (!validtype.includes(type)) {
            alert("Get valid image format png , jpeg , jpg , gif.")
            validation = false
        }
    }

    if (validation) {
        const uploadimage = document.getElementById('uploadimage')
        uploadimage.submit()
    }
})


function info_scroll(id) {
    
    const element = document.getElementById(id)
    element.scrollIntoView({ behavior: "smooth" })
}

function floatlabel(idlabel, idinput, output) {
    const label = document.getElementById(idlabel)
    const input = document.getElementById(idinput).value
    if (input.length > -1) {
        label.classList.add('activelabel')
        document.getElementById(idinput).classList.add('activeinput')
        form_value(idinput, output);
    } else {
        label.classList.remove('activelabel')
        document.getElementById(idinput).classList.remove('activeinput')
    }
}



function getCharWidth(char, font = '16px Arial') {
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');
    context.font = font;
    return context.measureText(char).width;
}
function adjustWidth(id) {
    const input = document.getElementById(id)
    const font = window.getComputedStyle(input).font
    let width = 0
    for (const char of input.value) {
        width += getCharWidth(char, font)
    }
    console.log(width + "px")
    input.style.width = width + "px"
}

function form_value(input_value, display_value) {
    const input = document.getElementById(input_value).value
    const display = document.getElementById(display_value)
    display.value = input
    console.log(display + input)
    adjustWidth(display_value)
    discounted_price()
}
document.getElementById('upload_imge').addEventListener('input', () => {
    let img = document.getElementById('upload_imge')
    document.getElementById('product-image').src = URL.createObjectURL(img.files[0]);
    console.log(upload_imge)
})

function discounted_price() {
    const price = document.getElementById('price').value
    const discounted = document.getElementById('discounted').value
    let percent = price / 100
    let percentage = price - (percent * discounted)
    console.log(percentage)
    const discounted_price = document.getElementById('discounted-price')
    discounted_price.value = percentage
    adjustWidth(discounted_price)
}

function uploadform() {
    let validation = true
    const image = document.getElementById('upload_imge').files[0]
    const brand_name = document.getElementById('brand-name').value
    const product_name = document.getElementById('product-name').value
    const price = document.getElementById('price').value
    const discounted = document.getElementById('discounted').value
    const categotry = document.getElementById('category').value
    const manufactor_date = document.getElementById('manufactor_date').value
    const manufactor_by = document.getElementById('manufactor_by').value
    const weight = document.getElementById('weight').value
    const manufactor_country = document.getElementById('manufactor_country').value

    const product_error = document.getElementsByClassName('product_error')
    if (!image) {
        validation = false
        alert("please select valid image.")
    } else {
        let type = image.type
        let validtype = ["image/jpeg", "image/png", "image/webp", "image/jpg", "image/gif"]
        if (!validtype.includes(type)) {
            validation = false
            alert( "Get valid image format png , jpeg , jpg , gif.")
        }
    }
    if (product_name === "") {
        validation = false
        product_error[0].innerHTML = "please fill the place"
    } else {
        product_error[0].innerHTML = ""
    }
    if (brand_name === "") {
        validation = false
        product_error[1].innerHTML = "please fill the place"
    } else {
        product_error[1].innerHTML = ""
    }
    if (price === "") {
        validation = false
        product_error[2].innerHTML = "please fill the place"
    } else {
        product_error[2].innerHTML = ""
    }
    if (discounted === "") {
        validation = false
        product_error[3].innerHTML = "please fill the place"
    } else {
        product_error[3].innerHTML = ""
    }
    if (categotry === "") {
        validation = false
        product_error[4].innerHTML = "please fill the place"
    } else {
        product_error[4].innerHTML = ""
    }
    if (manufactor_date === "") {
        validation = false
        product_error[5].innerHTML = "please fill the place"
    } else {
        product_error[5].innerHTML = ""
    }
    if (manufactor_by === "") {
        validation = false
        product_error[6].innerHTML = "please fill the place"
    } else {
        product_error[6].innerHTML = ""
    }
    if (weight === "") {
        validation = false
        product_error[7].innerHTML = "please fill the place"
    } else {
        product_error[7].innerHTML = ""
    }
    if (manufactor_country === "") {
        validation = false
        product_error[8].innerHTML = "please fill the place"
    } else {
        product_error[8].innerHTML = ""
    }
    if (validation) {
        return true
    } else {
        return false
    }
}
function sidebar(e){
    if(e){
      document.getElementById('sidebar').style.transform='translate(0px)'  
      document.getElementById('sidebar').style.boxShadow ='0px 0px 20px 10px #242323c9'
    }
    else{
        document.getElementById('sidebar').style.transform='translate(300px)'
      document.getElementById('sidebar').style.boxShadow ='none'
    }
}