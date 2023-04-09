const messageList = document.querySelector('.message-list');
const messageInput = document.querySelector('.message-input textarea');
const sendButton = document.querySelector('.message-input button');

function addMessage(message, sender) {
  const messageItem = document.createElement('li');
  messageItem.classList.add('message', sender);

  const messageImg = document.createElement('div');
  messageImg.classList.add('message-img');
  const img = document.createElement('img');
  img.src = sender === 'sent' ? './img/me.jpg' : './img/user.jpg';
  messageImg.appendChild(img);

  const messageContent = document.createElement('div');
  messageContent.classList.add('message-content');
  messageContent.innerHTML = `<p>${message}</p>
    <span class="message-time">${new Date().toLocaleTimeString()}</span>`;
  
  messageItem.appendChild(messageImg);
  messageItem.appendChild(messageContent);
  messageList.appendChild(messageItem);
  messageList.scrollTop = messageList.scrollHeight;
}

function sendMessage() {
  const message = messageInput.value.trim();
  if (message) {
    addMessage(message, 'sent');
    messageInput.value = '';
  }
}

sendButton.addEventListener('click', sendMessage);

messageInput.addEventListener('keydown', function (event) {
  if (event.key === 'Enter') {
    event.preventDefault();
    sendMessage();
  }
});