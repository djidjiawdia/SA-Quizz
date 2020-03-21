/************************ INDEX FORM VALIDATION ************************/
const indexFormEl = document.getElementById("indexForm");

if(indexFormEl != null){

    indexFormEl.addEventListener("change", e => {
        if(e.target.value != ""){
            e.target.attributes.class = 'form-control bg-input';
            e.target.classList.remove("input-error");
        }
    })
    
    indexFormEl.addEventListener("submit", e => {
        let formValid = true;
        e.preventDefault();
        const formEl = e.target.querySelectorAll("input");
        formEl.forEach(el => {
            if(el.value == ''){
                el.classList.add("input-error");
                el.attributes.placeholder.value = `${el.attributes.placeholder.value} ne doit pas être vide`;
                formValid = false;
            }
        });
        if(formValid){
            console.log(indexFormEl)
            indexFormEl.submit();
        }
    });
}


/************************ MENU ADMIN PAGE ************************/
const liEl = document.querySelectorAll('ul > li');

if(liEl != null){
    if(location.href === "http://localhost/sa_quiz/pages/admin/accueil_admin.php"){
        liEl[0].className = 'active';
        liEl[0].children[1].src = liEl[0].children[1].src.replace(".png", "-active.png");
    }else{
        liEl.forEach(el => {
            el.className = '';
            el.children[1].src = el.children[1].src.replace("-active", "");
            if(el.children[0].href === location.href){
                el.className = "active";
                el.children[1].src = el.children[1].src.replace(".png", "-active.png");
            }
        })
    }
}
