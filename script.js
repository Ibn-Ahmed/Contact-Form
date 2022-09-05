
const form = document.getElementById("formData");
const sendButton = document.getElementById("sendButton");
const statusTxt = document.getElementById("statusTxt");


form.onsubmit = (e)=> {
    e.preventDefault();
    statusTxt.style.display = "block";
}

sendButton.addEventListener("click",loadForm);


function loadForm() {
    let xhr = new XMLHttpRequest();

    xhr.open('POST','message.php',true);

    xhr.onload = ()=> {
        if(xhr.status === 200) {
            let Response = xhr.response
            statusTxt.innerHTML = Response;

        if(statusTxt.innerHTML === "Email and Message field are required!" ) {
            statusTxt.style.color = "red";
        }else {
            statusTxt.style.color = "green";

            setTimeout(()=> {
                statusTxt.style.display = "none";
            },3000)

        
        }

        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}