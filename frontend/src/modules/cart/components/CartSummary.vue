<template>
    <div class="summary-card bo-rounded">
        <h2 class="summary-title serif">Tóm tắt đơn hàng</h2>

        <div class="summary-row">
            <span>Tạm tính:</span>
            <span class="font-bold">{{ formatPrice(subtotal) }}</span>
        </div>

        <div class="summary-row" v-if="discount > 0">
            <span>Giảm giá (Voucher):</span>
            <span class="discount-text">-{{ formatPrice(discount) }}</span>
        </div>

        <div class="summary-row">
            <span>Phí vận chuyển:</span>
            <span class="free-ship">Miễn phí toàn quốc</span>
        </div>

        <!-- Ô nhập Voucher -->
        <div class="voucher-box">
            <input type="text" v-model="voucherCode" placeholder="Nhập mã giảm giá..." class="voucher-input" />
            <button @click="$emit('apply-voucher', voucherCode)" class="btn-apply">Áp dụng</button>
        </div>

        <div class="summary-divider"></div>

        <div class="summary-row total-row">
            <span>Tổng thanh toán:</span>
            <span class="total-price red-bold">{{ formatPrice(total) }}</span>
        </div>
        <p class="vat-note">(Giá đã bao gồm VAT và Phí giao hàng tận nhà)</p>

        <!-- Nút CTA Thanh toán -->
        <button @click="$emit('checkout')" class="btn btn-gold btn-checkout bo-rounded">
            TIẾP TỤC THANH TOÁN ➔
        </button>

        <!-- Cam kết an tâm mua hàng -->
        <div class="trust-commitments">
            <div class="commit-item">
                <span class="icon">🛡️</span>
                <span>Kiểm tra hàng trước khi thanh toán</span>
            </div>
            <div class="commit-item">
                <span class="icon">🚚</span>
                <span>Miễn phí giao hàng & bọc xốp cẩn thận</span>
            </div>
            <div class="commit-item">
                <span class="icon">💬</span>
                <span>Tư vấn phong thủy: <strong>0988.000.000</strong></span>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'

defineProps({
    subtotal: { type: Number, required: true },
    discount: { type: Number, default: 0 },
    total: { type: Number, required: true }
})

defineEmits(['apply-voucher', 'checkout'])

const voucherCode = ref('')
const formatPrice = (val) => val.toLocaleString('vi-VN') + 'đ'
</script>

<style scoped>
.summary-card {
    background: #ffffff;
    border: 1px solid var(--wd-line, #e8e2d9);
    padding: 24px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
}

.bo-rounded {
    border-radius: 12px;
}

.summary-title {
    font-size: 20px;
    color: var(--wd-wood-900, #2c1810);
    margin: 0 0 16px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    margin-bottom: 12px;
    color: #444;
}

.discount-text,
.free-ship {
    color: #2e7d32;
    font-weight: 600;
}

.voucher-box {
    display: flex;
    gap: 8px;
    margin: 16px 0;
}

.voucher-input {
    flex: 1;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 8px 12px;
    font-size: 13px;
    outline: none;
}

.btn-apply {
    background: #2c1810;
    color: #fff;
    border: none;
    border-radius: 6px;
    padding: 0 16px;
    font-size: 13px;
    cursor: pointer;
}

.summary-divider {
    height: 1px;
    background: #eee;
    margin: 16px 0;
}

.total-price {
    font-size: 22px;
    color: #d9381e;
}

.vat-note {
    font-size: 11px;
    color: #888;
    margin: -8px 0 16px;
}

.btn-checkout {
    width: 100%;
    height: 48px;
    background: var(--wd-gold-600, #d4af37);
    color: #fff;
    border: none;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
}

.btn-checkout:hover {
    background: #b8860b;
}

.trust-commitments {
    margin-top: 20px;
    padding-top: 16px;
    border-top: 1px dashed #eee;
    display: flex;
    flex-direction: column;
    gap: 10px;
    font-size: 12px;
    color: #555;
}

.commit-item {
    display: flex;
    align-items: center;
    gap: 8px;
}
</style>