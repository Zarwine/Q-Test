class TableManager {
    constructor() {
        this.messages = document.querySelectorAll('.usermessage')
        for (let i = 0; i < this.messages.length; i++) {
            this.messages[i].classList.add("resume")
        }
        this.viewMoreBtn = document.querySelectorAll(".td-btn")
        for (let i = 0; i < this.viewMoreBtn.length; i++) {
            this.viewMoreBtn[i].addEventListener("click", () => {
                if (this.messages[i].classList.contains("resume")) {
                    this.messages[i].classList.remove("resume")
                } else {
                    this.messages[i].classList.add("resume")
                }
            })
        }
    }
}

let tableManager = new TableManager()