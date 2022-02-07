let copied = false;

function copyText() {
    const copyText = document.getElementById("messageInput");
    copyText.select();
    document.execCommand("copy");

    if (!copied) {
        const textNode = document.createTextNode("Message copied!");
        const paragraph = document.createElement("p");
        paragraph.appendChild(textNode);

        const messageFrame = document.getElementById("messageFrame");
        messageFrame.appendChild(paragraph);

        copied = true;
    }

}