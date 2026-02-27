// โค้ดสำหรับสไลด์โชว์
let slides = document.querySelectorAll('.hero img');
let index = 0;
setInterval(() => {
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
}, 3000);

// โค้ดทั้งหมดที่เกี่ยวข้องกับการจัดการกับ DOM
document.addEventListener('DOMContentLoaded', function() {
    // โค้ดสำหรับปุ่ม "ย้อนกลับ"
    const backButton = document.getElementById('backButton');
    if (backButton) {
        backButton.addEventListener('click', function() {
            history.back();
        });
    }

    // โค้ดสำหรับปุ่ม "เพิ่มลงตะกร้า"
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.id;
            const productName = this.dataset.name;
            const productPrice = parseFloat(this.dataset.price);
            const productImage = this.dataset.image; // อย่าลืมเพิ่มข้อมูลรูปภาพ

            const product = {
                id: productId,
                name: productName,
                price: productPrice,
                quantity: 1,
                image: productImage // เพิ่มข้อมูลรูปภาพลงใน Object
            };

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingProduct = cart.find(item => item.id === productId);

            if (existingProduct) {
                existingProduct.quantity += 1;
            } else {
                cart.push(product);
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            alert(`${productName} ถูกเพิ่มลงในตะกร้าแล้ว!`);
        });
    });
    // 1. ฟังก์ชัน เปิด/ปิด การมองเห็นรหัสผ่าน
function toggleView(inputId, icon) {
    const passwordInput = document.getElementById(inputId);
    
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}

// 2. ฟังก์ชันตรวจสอบว่ารหัสผ่านตรงกันหรือไม่ (ใส่ในตอนกดสมัคร)
const registerForm = document.getElementById('registerForm'); // เปลี่ยน id ให้ตรงกับฟอร์มของคุณ
if (registerForm) {
    registerForm.addEventListener('submit', function(e) {
        const pass = document.getElementById('password').value;
        const confirmPass = document.getElementById('confirm_password').value;

        if (pass !== confirmPass) {
            e.preventDefault(); // ไม่ให้ส่งฟอร์ม
            alert("รหัสผ่านทั้งสองช่องไม่ตรงกัน กรุณาตรวจสอบอีกครั้ง!");
        } else {
            alert("สมัครสมาชิกเรียบร้อยแล้ว!");
        }
    });
}
});