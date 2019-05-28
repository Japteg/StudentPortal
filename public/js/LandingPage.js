let loginContainer = $("#login");
let loginBtn = $("#loginBtn");
let signupContainer = $("#signup");
let signupBtn = $("#signupBtn");

let loginContainerVisible = false;
let signupContainerVisible = false;

loginBtn.on("click",function(){
  signupContainer.css("display", "none");
  signupContainerVisible = false;
  loginContainer.fadeToggle(1500);
  loginContainerVisible = !loginContainerVisible;
  if(loginContainerVisible){
    $("html,body").animate({
      scrollTop: $(document).height()
    }, 1500);
  }

  if(!loginContainerVisible) {
    $('html,body').animate({
      scrollTop: 0
    }, 1500);
  }
});

signupBtn.on("click",function(){
  loginContainer.css("display", "none");
  loginContainerVisible = false;
  signupContainer.fadeToggle(1500);
  signupContainerVisible = !signupContainerVisible;;
  if(signupContainerVisible){
    $('html,body').stop().animate({
      scrollTop: $(document).height()
    }, 1500);
  }

  if(!signupContainerVisible) {
    $('html,body').animate({
      scrollTop: 0
    }, 1500);
  }
});
