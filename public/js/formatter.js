
function stringifyPayloads() {
    const payloads = document.querySelectorAll('.payload');
    payloads.forEach(element => {
        try {
            console.log(element.textContent);
            const jsonContent = JSON.parse(element.textContent.replace(/'/g, '"'));
            console.log(jsonContent);
            const stringifiedContent = JSON.stringify(jsonContent, null, 2);
            element.textContent = stringifiedContent;

        } catch (error) {
            console.error("Error parsing JSON:", error);
        }
    });
}

stringifyPayloads();
