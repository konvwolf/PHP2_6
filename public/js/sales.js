"use strict";

class Sales {
    constructor () {
        this.status = document.querySelectorAll(".change_status")
        this._listener ()
    }

    _listener () {
        this.status.forEach(st => st.addEventListener("change", this._changeStatus.bind(this)))
    }

    _changeStatus (el) {
        this.value = el.target.options.selectedIndex
        this.prodID = el.target.dataset.id
        this.xhr = new XMLHttpRequest()
        this.xhr.open ("POST", "/index.php?c=sales", true)
        this.xhr.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded")
        this.change = "change_status=" + this.value + "&prod_id=" + this.prodID
        this.xhr.onreadystatechange = () => {
				if (this.xhr.readyState == 4 && this.xhr.status == 200) {
                    el.target.options[this.value].style.backgroundColor = "color: lightgreen"
				}
        }
        this.xhr.send (this.change)
        console.log(el.target.options[this.value].innerText)
    }
}

let sales = new Sales;