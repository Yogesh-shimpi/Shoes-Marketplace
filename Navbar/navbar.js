const nav_text = document.getElementById('nav_text');
let category_length = false
let log_in = false
nav_text.addEventListener('click',() => {
    const transition =document.getElementsByClassName('transition')
    const dropdown = document.getElementsByClassName('dropdown-menu');
    if(!category_length){
        transition[1].style.height = '480%'
      dropdown[0].style.setProperty('display', 'flex', 'important');
      console.log(category_length)
        category_length = true
    }
    else{
        transition[1].style.height = '0%'
         dropdown[0].style.setProperty('display', 'none', 'important');
          console.log(category_length)
          category_length = false
    }
});
function scroll_effect_category(id){
    const element = document.getElementById(id)
    element.scrollIntoView({behavior:"smooth"})
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
document.getElementById('a').addEventListener('click',()=>{
   
  if(!log_in){
      document.getElementById('option_log_in').style.display = "block"
      document.getElementById('arrow').innerHTML = "keyboard_arrow_down"
      log_in = true
    }else{
      document.getElementById('option_log_in').style.display = "none"
      document.getElementById('arrow').innerHTML = "chevron_right"
      log_in = false
    }
})

document.getElementById('account').addEventListener('click',()=>{
  let alert = confirm("Your not log in please login , Click on Ok for login.")
  if(alert){
    window.location.href = "../Sign in/Sign_in.php";
  }
})