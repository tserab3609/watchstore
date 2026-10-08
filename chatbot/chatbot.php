<!-- Watch Assistant Chatbot -->

<div id="chatbot-button" onclick="openChatbot()">
    💬
</div>

<div id="chatbot-box">

    <div id="chatbot-header">
        <span>⌚ Watch Assistant</span>
        <button onclick="closeChatbot()">×</button>
    </div>

    <div id="chatbot-messages">

        <div class="bot-message">
            Hello! 👋<br>
            Welcome to Luxx Time Watch Store.<br>
            How can I help you?
        </div>

    </div>

    <div id="chatbot-input-area">
        <input
            type="text"
            id="chatbot-input"
            placeholder="Type your question..."
            onkeypress="handleEnter(event)"
        >

        <button onclick="sendMessage()">Send</button>
    </div>

</div>

<style>

#chatbot-button {
    position: fixed;
    bottom: 25px;
    right: 25px;
    width: 60px;
    height: 60px;
    background: #222;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    cursor: pointer;
    z-index: 9999;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}

#chatbot-box {
    display: none;
    position: fixed;
    bottom: 95px;
    right: 25px;
    width: 350px;
    height: 450px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.3);
    z-index: 9999;
    overflow: hidden;
}

#chatbot-header {
    background: #222;
    color: white;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    font-weight: bold;
}

#chatbot-header button {
    background: none;
    border: none;
    color: white;
    font-size: 22px;
    cursor: pointer;
}

#chatbot-messages {
    height: 330px;
    padding: 15px;
    overflow-y: auto;
    background: #f5f5f5;
}

.bot-message,
.user-message {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 10px;
    max-width: 85%;
}

.bot-message {
    background: white;
    border: 1px solid #ddd;
}

.user-message {
    background: #222;
    color: white;
    margin-left: auto;
}

#chatbot-input-area {
    display: flex;
    padding: 10px;
    border-top: 1px solid #ddd;
}

#chatbot-input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

#chatbot-input-area button {
    margin-left: 5px;
    padding: 10px 15px;
    background: #222;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

</style>

<script>

function openChatbot() {
    document.getElementById("chatbot-box").style.display = "block";
}

function closeChatbot() {
    document.getElementById("chatbot-box").style.display = "none";
}

function handleEnter(event) {
    if (event.key === "Enter") {
        sendMessage();
    }
}

function sendMessage() {

    let input = document.getElementById("chatbot-input");
    let message = input.value.trim();

    if (message === "") {
        return;
    }

    let messages = document.getElementById("chatbot-messages");

    // Display user message
    messages.innerHTML +=
        '<div class="user-message">' +
        message +
        '</div>';

    input.value = "";

    let reply = getBotReply(message);

    // Display bot reply
    messages.innerHTML +=
        '<div class="bot-message">' +
        reply +
        '</div>';

    messages.scrollTop = messages.scrollHeight;
}

function getBotReply(message) {

    message = message.toLowerCase();

    if (
        message.includes("hello") ||
        message.includes("hi") ||
        message.includes("hey")
    ) {
        return "Hello! 👋 Welcome to our Watch Store. How can I help you?";
    }

    if (
        message.includes("watch") ||
        message.includes("product")
    ) {
        return "We sell different types of watches. You can visit our Shop page to see all available watches.";
    }

    if (
        message.includes("buy") ||
        message.includes("purchase")
    ) {
        return "To buy a watch, go to the Shop page, select your watch, add it to your cart, and proceed to checkout.";
    }

    if (
        message.includes("cart")
    ) {
        return "To add a watch to your cart, open the product and click the Add to Cart option.";
    }

    if (
        message.includes("payment") ||
        message.includes("pay")
    ) {
        return "You can proceed to checkout and select the available payment option to complete your order.";
    }

    if (
        message.includes("order")
    ) {
        return "After placing an order, you can check your order information from your account.";
    }

    if (
        message.includes("contact") ||
        message.includes("phone") ||
        message.includes("email")
    ) {
        return "You can contact us through the Contact Us page. Our store information is also available in the footer.";
    }

    if (
        message.includes("price") ||
        message.includes("cost")
    ) {
        return "You can see the price of each watch on the Shop and Product pages.";
    }

    if (
        message.includes("thank")
    ) {
        return "You're welcome! 😊 Happy shopping!";
    }

    return "Sorry, I don't understand that yet. You can ask me about watches, products, buying, cart, payment, orders, prices, or contact information.";
}

</script>