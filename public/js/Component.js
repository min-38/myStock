class Component {
    constructor() {
        this.target = "";
    }

    render(view, target) {
        document.getElementById(target).innerHTML = view;
    }
}