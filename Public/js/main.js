/************************ INDEX FORM VALIDATION ************************/
const indexFormEl = document.getElementById("indexForm");

if(indexFormEl != null){
    
    indexFormEl.addEventListener("change", e => formInputRemoveErr(e));
    
    indexFormEl.addEventListener("submit", e => {
        e.preventDefault();
        if(formInputValid(e)){
            indexFormEl.submit();
        }
    });
}

/************************ FORM FUNCTION VALIDATION ************************/
const regexLogin = /^[A-Za-z]\w{5,}$/;
const regexPass = /^(?=.*[A-Z])(?=.*[\w])(?=.*[0-9])(?=.*[a-z]).{6,14}$/;
formInputRemoveErr = (e) => {
    if(e.target.type == 'file'){
        const fileSize = e.target.files[0].size;
        const fileName = e.target.files[0].name;
        
        const extensions = ["jpg", "jpeg", "png"];

        const fileExt = fileName.split(".");
        fileActExt = fileExt[fileExt.length-1].toLowerCase();

        const avatar = document.getElementById('inscAvatar');
        
        if(e.target.value !== '' && fileSize <= 500000 && extensions.includes(fileActExt)){
            if(e.target.parentElement.querySelector('p') != null){
                e.target.parentElement.removeChild(e.target.parentElement.querySelector('p'))
            }
            avatar.src = URL.createObjectURL(e.target.files[0]);
        }else{
            avatar.src = "/sa_quiz/public/images/avatar.png";
        }
    }else if(e.target.value.trim() !== ""){
        if(e.target.parentElement.querySelector('p') != null){
            e.target.parentElement.removeChild(e.target.parentElement.querySelector('p'))
        }
    }
}

formInputValid = (e) => {
    formValid = true
    const formEl = e.target.querySelectorAll("input");
    formEl.forEach(el => {
        if(el.parentElement.querySelector('p') != null){
            el.parentElement.removeChild(el.parentElement.querySelector('p'))
        }
        const p = document.createElement('p');
        p.style.color = "red";
        if(el.type === 'file'){
            if(el.value === ''){
                p.innerHTML = "Veuillez choisir une image";
                el.parentElement.append(p);
                formValid = false;
                // el.parentElement.children[1].classList.add("bg-error");
            }else{
                const fileSize = el.files[0].size;
                const fileName = el.files[0].name;
                
                const extensions = ["jpg", "jpeg", "png"];

                const fileExt = fileName.split(".");
                fileActExt = fileExt[fileExt.length-1].toLowerCase();

                if(!extensions.includes(fileActExt)){
                    p.innerHTML = "Veuillez choisir un format jpg ou png";
                    el.parentElement.append(p);
                    formValid = false;
                }else if(fileSize > 500000){
                    p.innerHTML = "Fichier trop volumineux";
                    el.parentElement.append(p);
                    formValid = false;
                }
            }
        }else if(el.value.trim() == ''){
            p.innerHTML = `${(el.parentElement.children[0].innerText)?el.parentElement.children[0].innerText : el.attributes.placeholder.value} ne doit pas être vide`;
            el.parentElement.append(p);
            formValid = false;
        }else if(el.name === 'login'){
            if(el.value.match(regexLogin) == null){
                p.innerHTML = "Login invalid: (a-zA-Z)(0-9) > 5";
                el.parentElement.append(p);
                formValid = false;
            }
        }else if(el.type === 'password'){
            if(el.name === 'password'){
                if(el.value.match(regexPass) == null){
                    p.innerHTML = "Password invalid: (a-zA-Z)(0-9) [7-14]";
                    el.parentElement.append(p);
                    formValid = false;
                }
            }else{
                formEl.forEach(pass => {
                    if(pass.type === 'password'){
                        if(pass.name === 'password'){
                            if(el.value !== pass.value){
                                p.innerHTML = "Les mots de passe ne sont pas identique";
                                el.parentElement.append(p);
                                formValid = false;
                            }
                        }
                    }
                });
            }
        }
    });
    return formValid;
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
            link = location.href.split('&');
            if(el.children[0].href === link[0]){
                el.className = "active";
                el.children[1].src = el.children[1].src.replace(".png", "-active.png");
            }
        })
    }
}

/************************ DECONNEXION ************************/
const decon = document.getElementById('deconnexion');

if(decon != null){
    decon.addEventListener("click", e => {
        if(!confirm('Voulez vous se deconnecter ?')){
            e.preventDefault();
        }
    });
}


/************************ INSCRIPTION FORM VALIDATION ************************/
const inscFormEl = document.getElementById("inscForm");

if(inscFormEl != null){
    
    inscFormEl.addEventListener("change", e => formInputRemoveErr(e));
    
    inscFormEl.addEventListener("submit", e => {
        e.preventDefault();
        if(formInputValid(e)){
            inscFormEl.submit();
        }
    });
}
