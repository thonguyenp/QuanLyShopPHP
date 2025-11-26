const chatToggle = document.getElementById('chat-toggle');
const chatBox = document.getElementById('chat-box');
const chatClose = document.getElementById('chat-close');

chatToggle.addEventListener('click', () => {
    chatBox.classList.toggle('show');
});

chatClose.addEventListener('click', () => {
    chatBox.classList.remove('show');
});
document.getElementById("send-btn").addEventListener("click", sendMessage);
document.getElementById("message-input").addEventListener("keypress", function(e) {
    if (e.key === "Enter") sendMessage();
});

function appendMessage(sender, message) {
    const msgBox = document.getElementById("chat-messages");
    msgBox.innerHTML += `
        <div class="${sender}">
            <p><strong>${sender === 'user' ? 'Bạn' : 'Bot'}:</strong> ${message}</p>
        </div>
    `;
    msgBox.scrollTop = msgBox.scrollHeight;
}

function sendMessage() {
    let text = document.getElementById("message-input").value.trim();
    if (!text) return;

    appendMessage('user', text);
    document.getElementById("message-input").value = '';

    fetch("/chatbot/send", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ message: text })
    })
    .then(response => response.json())
    .then(data => {
        appendMessage('bot', data.reply);
    })
    .catch(() => {
        appendMessage('bot', "Không thể kết nối chatbot.");
    });
}
