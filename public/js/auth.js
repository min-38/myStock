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
    xhr.responseType = 'json';
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(formData);

    //Callback
    xhr.onload = () => {
        if (xhr.status == 200) {
            //success
            if(xhr.response.success) {
                alert(xhr.response.msg);
                window.location.href = xhr.response.redirectUrl;
            }
        } else if (xhr.status == 422) {
            setErrorMsg(xhr.response);
        } else {
            //failed
            alert("알 수 없는 오류가 발생했습니다.\n다시 한번 시도해주세요.");
        }
    }
}

function setErrorMsg(json) {
    
    let setCursor = false; // 유효성 검사 에러난 input 중 첫번째 input을 focus

    // 유효성 검사 오류 텍스트 초기화
    const allFeedback = document.querySelectorAll(".invalid-feedback"); 
    allFeedback.forEach((ob)=>{
        ob.classList.remove("active");
    })

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
