const codeElement = document.querySelector('input[name=code]');



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


const deleteBtn = document.getElementById('delete-btn');
if(deleteBtn){
    deleteBtn.addEventListener('click', function (event) {
        event.preventDefault();
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
            }).then(() => {
            document.querySelector('#delete-form').submit();
        });
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire({
            title: "Cancelled",
            text: "Your imaginary file is safe :)",
            icon: "error"
            });
        }
        });
    });
}

