class AutoComplete {
    constructor(selector) {
        this.selector = selector;
        this.autoComplete = null;
        this.data = [];
    }

    setAutoComplete() {
        this.autoComplete = new autoComplete (
            {
                selector: this.selector,
                placeHolder: "Search Stocks...",
                data: {
                    // src: ["Sauce - Thousand Island", "Wild Boar - Tenderloin", "Goat - Whole Cut"],
                    cache: false,
                },
                resultsList: {
                    element: (list, data) => {
                        if (!data.results.length) {
                            // Create "No Results" message element
                            const message = document.createElement("div");
                            // Add class to the created element
                            message.setAttribute("class", "no_result");
                            // Add message text content
                            message.innerHTML = `<span>Found No Results for "${data.query}"</span>`;
                            // Append message element to the results list
                            list.prepend(message);
                        }
                    },
                    noResults: true,
                },
                searchEngine: "strict",
                submit: true,
                resultItem: {
                    highlight: true,
                },
            }
        );
    }

    getAutoCompleteData() {
        
    }

    render() {

    }
}