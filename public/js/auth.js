function doLogin() {

}

window.onload = function(){
    const submitBtn = document.getElementById("submit");
    submitBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const btnType = this.dataset.type;
        
        switch(btnType) {
            case "signup":
                doSignup();
                break;
            case "login":
                doLogin();
                break;
        }
    });
}

function doSignup()
{
    const formData = new FormData(document.getElementById("signupForm"));

    // AJAX
    const xhr = new XMLHttpRequest();

    xhr.open('POST', '/signup', true); // 요청을 보낼 방식, url, 비동기여부 설정
    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);
    xhr.setRequestHeader('Accept', 'application/json'); 
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(formData);

    //Callback
    xhr.onload = () => {
        if (xhr.status == 200) {
            //success
            // console.log(xhr.response);
            
        } else if (xhr.status == 422) {
            const response = xhr.response;
            const jsonData = JSON.parse(response);

            setErrorMsg(jsonData);
            
        } else {
            //failed
            console.log("3");
        }
    }
}

function setErrorMsg(json) {
    let setCursor = false;
    Object.keys(json.errors).forEach(function(key){
        const inputDiv = document.getElementById(key + "Div");
        const feedback = inputDiv.getElementsByClassName("invalid-feedback")[0];
        feedback.classList.add('active');
        feedback.innerText = json.errors[key];
        
        if(!setCursor) {
            inputDiv.getElementsByClassName("signinData")[0].focus();
            setCursor = true;
        }
    });
}
