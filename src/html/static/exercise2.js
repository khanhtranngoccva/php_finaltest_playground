document.querySelector("#value-form").addEventListener("submit", function (e) {
    const fd = new FormData(this);
    for (let [entry, value] of fd.entries()) {
        const input = this.querySelector(`[name="${entry}"]`);
        if (!value || Number.isNaN(Number(value))) {
            e.preventDefault()
            input.style.borderColor = "red";
        } else {
            input.style.removeProperty("border-color");
        }
    }
})