function popup(popup_name){
    getpopup=document.getElementById(popup_name);
    if(getpopup.style.display=='flex'){
        getpopup.style.display='none';
    }
    else{
        getpopup.style.display='flex'
    }
}

function popupl(){
    regpop=document.getElementById("register-popup");
    logpop=document.getElementById("login-popup");
    if(logpop.style.display=='flex'){
        logpop.style.display='none';
        regpop.style.display='flex';
    }
}

function popupr(){
    regpop=document.getElementById("register-popup");
    logpop=document.getElementById("login-popup");
    if(regpop.style.display=='flex'){
        regpop.style.display='none';
        logpop.style.display='flex';
    }
    // else{
    //     regpop.style.display=='none';
    // }
}

// function hell(){
//     alert("Hello! I am an alert box!!");
// }
// function playanime(){
//     fom=document.getElementsByClassName("formarea");
//     fom.style.animationPlayState="running";
// }