let getToggleBtn = document.querySelector(".toggle-btn");
let toggleClick = true;

let toggleNav = function(){
    let getNavSidebar = document.querySelector(".nav-sidebar");
    let getNavSidebarUl = document.querySelector(".nav-sidebar ul");
    let getNavSidebarLinks = document.querySelectorAll(".nav-sidebar ul li a");

    if(toggleClick === true){
        getNavSidebarUl.style.overflow = "visible";
        getNavSidebarUl.style.visibility = "visible";
        getNavSidebar.style.width = "200px";

        for(let i = 0 ; i < getNavSidebarLinks.length ; i++){
            getNavSidebarLinks[i].style.opacity = "1";
        }
        toggleClick = false;
    }
    else if(toggleClick === false){
        getNavSidebarUl.style.overflow = "hidden";
        getNavSidebarUl.style.visibility = "hidden";
        getNavSidebar.style.width = "50px";

        for(let i = 0 ; i < getNavSidebarLinks.length ; i++){
            getNavSidebarLinks[i].style.opacity = "0";
        }
        toggleClick = true;
    }
}
getToggleBtn.onclick = toggleNav;
