const codeElement = document.querySelector('input[name=code]');

document.addEventListener('DOMContentLoaded', function () {

});

if(codeElement){
    addGeneratedDiscountCode();
}
function addGeneratedDiscountCode(){
    const generateCodeElement = document.querySelector('#generate-code');
    generateCodeElement.addEventListener('click',insertCode);

    async function insertCode() {
        const code = generateDiscountCode();
        const is_exist = await checkCodeAvailable(checkCodeUrl,code);
        if(!is_exist){
            codeElement.value = code;
        }else{
            insertCode();
        }
    }


    async function checkCodeAvailable(url,code) {
        const response = await fetch(url);
        const data = await response.json();
        return data.data.is_exist;
    }

    function generateDiscountCode() {
        const prefix = "DISCOUNT";
        const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        let code = prefix;

        for (let i = 0; i < 4; i++) {
            const randomIndex = Math.floor(Math.random() * characters.length);
            code += characters[randomIndex];
        }

        return code;
    }
}
