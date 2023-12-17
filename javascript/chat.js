const form = document.querySelector(".typing-area");
const incoming_id = form.querySelector(".incoming_id").value;
const inputField = form.querySelector(".input-field");
const fileInput = document.getElementById("file-input");
const sendBtn = form.querySelector("button");
const chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
  e.preventDefault();
};

inputField.focus();
inputField.onkeyup = () => {
  if (inputField.value != "") {
    sendBtn.classList.add("active");
  } else {
    sendBtn.classList.remove("active");
  }
};

sendBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/insert-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        inputField.value = "";
        fileInput.value = ""; // Clear file input
        scrollToBottom();
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};

fileInput.addEventListener("change", function () {
  const file = this.files[0];

  if (file) {
    const formData = new FormData();
    formData.append("file", file);
    formData.append("incoming_id", incoming_id);

    // Send the file to the server
    fetch("php/insert-chat.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((fileInfo) => {
        // Handle displaying the file information in the chat
        // ...

        console.log("File sent:", fileInfo);
      })
      .catch((error) => console.error("Error uploading file:", error));
  }
});

chatBox.onmouseenter = () => {
  chatBox.classList.add("active");
};

chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
        if (!chatBox.classList.contains("active")) {
          scrollToBottom();
        }
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("incoming_id=" + incoming_id);
}, 500);

function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}
