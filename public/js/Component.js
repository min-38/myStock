class Component {
    constructor() {
        this.target = "";
    }

    setTarget(target) {
        this.target = document.getElementById(target);
    }

    render(view) {
        this.target.innerHTML = view;
    }
}