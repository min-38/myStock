class Base extends Component {
    constructor() {
        super();
        this.xhr = new XMLHttpRequest();
    }

    sendXhr(target, data, responseType = "json") {
        // AJAX        
        this.xhr.open('POST', target + ((/\?/).test(target) ? "&" : "?") + (new Date()).getTime(), true); // 요청을 보낼 방식, url, 비동기여부 설정

        this.xhr.setRequestHeader('Accept', 'application/json');
        this.xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);
        this.xhr.withCredentials = true;
        // this.xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        this.xhr.responseType = responseType;

        this.xhr.send(data);

        return this.xhr;
    }
}