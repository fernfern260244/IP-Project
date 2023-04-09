<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Chat Page</title>
    <link rel="stylesheet" href="chat03.css">
  </head>
  <body>
  <div class="chat-container">
      <div class="chat-list">
        <h1>Chats</h1>
        <input type="text" placeholder="Search">
        <ul>
          <li class="chat-item active">
            <div class="chat-img">
              <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="User">
            </div>
            <div class="chat-details">
              <h2>Anna Smith</h2>
              <p>Hey, how's it going?</p>
            </div>
          </li>
          <li class="chat-item">
            <div class="chat-img">
              <img src="https://randomuser.me/api/portraits/men/40.jpg" alt="User">
            </div>
            <div class="chat-details">
              <h2>John Doe</h2>
              <p>Do you have any plans for tonight?</p>
            </div>
          </li>
          <li class="chat-item">
            <div class="chat-img">
              <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="User">
            </div>
            <div class="chat-details">
              <h2>Jane Doe</h2>
              <p>What's up?</p>
            </div>
          </li>
          <li class="chat-item">
            <div class="chat-img">
              <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="User">
            </div>
            <div class="chat-details">
              <h2>Mike Smith</h2>
              <p>See you later!</p>
            </div>
          </li>
        </ul>
      </div>
      <div class="messages-list">
        <ul>
          <li class="message received">
            <div class="message-img">
              <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="User">
            </div>
            <div class="message-content">
              <p>Anna Smith</p>
              <p>Hey, how's it going?</p>
              <span class="message-time">10:30 AM</span>
            </div>
          </li>
          <li class="message sent">
            <div class="message-img">
              <img src="https://randomuser.me/api/portraits/men/40.jpg" alt="User">
            </div>
            <div class="message-content">
              <p>John Doe</p>
              <p>Pretty good, thanks! How about you?</p>
              <span class="message-time">10:31 AM</span>
            </div>
          </li>
          <li class="message received">
            <div class="message-img">
              <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="User">
            </div>
            <div class="message-content">
              <p>Anna Smith</p>
              <p>Not too bad, just catching up on some work. What are you up to?</p>
              <span class="message-time">10:35 AM</span>        </li>
          <li class="message sent">
            <div class="message-img">
              <img src="https://randomuser.me/api/portraits/men/40.jpg" alt="User">
            </div>
            <div class="message-content">
              <p>John Doe</p>
              <p>Nothing much, just hanging out at home. How about we grab some dinner later?</p>
              <span class="message-time">10:35 AM</span>
            </div>
          </li>
          <li class="message received">
            <div class="message-img">
              <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="User">
            </div>
            <div class="message-content">
              <p>Anna Smith</p>
              <p>Sure, where do you want to go?</p>
              <span class="message-time">10:38 AM</span>
            </div>
          </li>
          <li class="message sent">
            <div class="message-img">
              <img src="https://randomuser.me/api/portraits/men/40.jpg" alt="User">
            </div>
            <div class="message-content">
              <p>John Doe</p>
              <p>How about that new Italian place on Main Street?</p>
              <span class="message-time">10:40 AM</span>
            </div>
          </li>
        </ul>
        <div class="message-input">
          <textarea placeholder="Type your message"></textarea>
          <button>Send</button>
        </div>
      </div>
    </div>
    <script src="caht03.js"></script>
  </body>
</html>