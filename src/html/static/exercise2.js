document.querySelector("#login-form").addEventListener("submit", function(e) {
    const fd = new FormData(this);
    const pw = fd.get("password");
    if (!password_valid(pw)) {
        e.preventDefault();
        this.querySelector("[name='password']").style.borderColor = "red";
        return false;
    }
    this.querySelector("[name='password']").style.removeProperty("border-color");
    return true;
});

function password_valid(pw) {
    const c1 = /^[a-z0-9]+$/i.test(pw);
    const c2 = /[A-Z]/.test(pw);
    return typeof pw === "string" && c1 && c2;
}