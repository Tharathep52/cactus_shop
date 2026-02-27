document.addEventListener('DOMContentLoaded', function() {
    const orderItemsList = document.getElementById('order-items');
    const orderTotalSpan = document.getElementById('order-total');

    function displayCart() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        let total = 0;
        orderItemsList.innerHTML = ''; 

        if (cart.length === 0) {
            orderItemsList.innerHTML = `
                <li class="empty-cart">
                    <div>
                        <i class="fas fa-shopping-cart" style="font-size:48px; color:#ddd; margin-bottom:15px;"></i>
                        <p>ไม่มีสินค้าในตะกร้า</p>
                    </div>
                </li>
            `;
            orderTotalSpan.textContent = '0';
            
            // ปิดการใช้งานปุ่มยืนยันเมื่อไม่มีสินค้า
            const confirmBtn = document.getElementById('confirm-btn');
            if (confirmBtn) confirmBtn.disabled = true;
            return;
        }

        // เปิดการใช้งานปุ่มยืนยันเมื่อมีสินค้า
        const confirmBtn = document.getElementById('confirm-btn');
        if (confirmBtn) confirmBtn.disabled = false;

        cart.forEach((item, index) => {
            const li = document.createElement('li');
            li.style.display = 'flex';
            li.style.alignItems = 'center';
            li.style.gap = '10px';
            li.style.marginBottom = '12px';
            li.style.padding = '12px';
            li.style.background = '#f9f9f9';
            li.style.borderRadius = '8px';
            li.style.transition = '0.2s';

            li.innerHTML = `
                <img src="${item.image}" alt="${item.name}" 
                     style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; flex-shrink: 0;">
                <div style="flex-grow: 1; min-width: 0;">
                    <div style="font-weight: bold; margin-bottom: 5px; font-size: 14px;">${item.name}</div>
                    <div style="font-size: 12px; color: #666;">
                        ${item.price.toLocaleString()} บาท × ${item.quantity}
                    </div>
                    <div style="font-weight: bold; color: #27ae60; font-size: 14px; margin-top: 4px;">
                        ${(item.price * item.quantity).toLocaleString()} ฿
                    </div>
                </div>
                <button onclick="removeItem(${index})" 
                        style="background: #e74c3c; color: white; border: none; padding: 8px 10px; 
                               border-radius: 6px; cursor: pointer; font-size: 12px; transition: 0.2s;
                               flex-shrink: 0; display: flex; align-items: center; gap: 4px;"
                        onmouseover="this.style.background='#c0392b'" 
                        onmouseout="this.style.background='#e74c3c'"
                        title="ลบสินค้านี้">
                    <i class="fas fa-trash-alt"></i>
                </button>
            `;
            
            orderItemsList.appendChild(li);
            total += item.price * item.quantity;
        });
        
        orderTotalSpan.textContent = total.toLocaleString();
    }

    // ฟังก์ชันลบสินค้า
    window.removeItem = function(index) {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const itemName = cart[index].name;
        
        if (confirm(`🗑️ ต้องการลบ "${itemName}" ออกจากตะกร้าหรือไม่?`)) {
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            displayCart();
            
            // แสดงข้อความแจ้งเตือน
            showNotification('✅ ลบสินค้าออกจากตะกร้าแล้ว', 'success');
        }
    }

    // ฟังก์ชันแสดงการแจ้งเตือน
    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.innerHTML = `<i class="fas fa-check-circle"></i> ${message}`;
        
        const bgColor = type === 'success' ? '#27ae60' : '#e74c3c';
        
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${bgColor};
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            z-index: 1000;
            animation: slideIn 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => notification.remove(), 300);
        }, 2500);
    }

    displayCart();
    
    // จัดการฟอร์มยืนยันการสั่งซื้อ
    const checkoutForm = document.getElementById('checkoutForm');
    if (checkoutForm) {
        checkoutForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            if (cart.length === 0) {
                showNotification('⚠️ ไม่มีสินค้าในตะกร้า กรุณาเลือกสินค้าก่อน', 'error');
                setTimeout(() => {
                    window.location.href = 'products.html';
                }, 1500);
                return;
            }
            
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            const confirmMessage = paymentMethod === 'transfer' 
                ? '✅ ยืนยันการสั่งซื้อและส่งสลิปการโอนเงิน?\n\nยอดรวม: ' + orderTotalSpan.textContent + ' บาท'
                : '✅ ยืนยันการสั่งซื้อแบบเก็บเงินปลายทาง?\n\nยอดรวม: ' + orderTotalSpan.textContent + ' บาท';
            
            if (confirm(confirmMessage)) {
                // บันทึกข้อมูลการสั่งซื้อ
                const orderData = {
                    items: cart,
                    total: cart.reduce((sum, item) => sum + (item.price * item.quantity), 0),
                    paymentMethod: paymentMethod,
                    date: new Date().toLocaleString('th-TH'),
                    customerName: document.getElementById('recipient-name').value,
                    phone: document.getElementById('phone').value,
                    address: document.getElementById('address').value
                };
                
                // เก็บประวัติคำสั่งซื้อ
                const orders = JSON.parse(localStorage.getItem('orders')) || [];
                orders.push(orderData);
                localStorage.setItem('orders', JSON.stringify(orders));
                
                // ล้างตะกร้า
                localStorage.removeItem('cart');
                
                // แสดงข้อความสำเร็จ
                alert('🎉 สั่งซื้อสำเร็จ!\n\nขอบคุณที่ใช้บริการ Cactus Shop\nเราจะติดต่อกลับเร็วๆ นี้');
                window.location.href = 'index.html';
            }
        });
    }
    
    // ฟังก์ชันสำหรับสลับการแสดงผล โอนเงิน / เก็บเงินปลายทาง
    window.togglePayment = function(method) {
        const bankInfo = document.getElementById('bank-info');
        const slipSection = document.getElementById('slip-section');
        const slipInput = document.getElementById('slip-file');

        if (method === 'cod') {
            bankInfo.style.display = 'none';
            if(slipSection) slipSection.style.display = 'none';
            if(slipInput) slipInput.removeAttribute('required');
        } else {
            bankInfo.style.display = 'block';
            if(slipSection) slipSection.style.display = 'block';
            if(slipInput) slipInput.setAttribute('required', 'required');
        }
    }
    
    // เรียกใช้เริ่มต้น
    togglePayment('transfer');
});

// เพิ่ม CSS animation
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    
    .item-list li:hover {
        background: #f0f0f0 !important;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
`;
document.head.appendChild(style);