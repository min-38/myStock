class Base {
    constructor() {
        this.xhr = new XMLHttpRequest();
    }

    sendXhr(target, data, async, responseType = "json") {
        // AJAX
        const xhr = this.xhr;
        return new Promise(function (resolve, reject) {
            xhr.open('POST', target + ((/\?/).test(target) ? "&" : "?") + (new Date()).getTime(), async); // 요청을 보낼 방식, url, 비동기여부 설정

            xhr.setRequestHeader('Accept', 'application/json');
            xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);
            xhr.responseType = responseType;
            xhr.onload = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    resolve(xhr.response);
                } else {
                    reject("알 수 없는 오류가 발생했습니다.\n다시 한번 시도해주세요.");
                }
            }
            xhr.send(data);
        });
    }

    subtractYears(date, years) {
        date.setFullYear(date.getFullYear() - years);
        return date;
    }
}

const base = new Base();