<template>
    <div class="payment-card bo-rounded">
        <h2 class="form-title serif">2. Phương thức thanh toán</h2>

        <div class="payment-options">
            <!-- Phương thức 1: COD -->
            <label class="payment-option" :class="{ active: selectedMethod === 'cod' }">
                <input type="radio" value="cod" v-model="selectedMethod"
                    @change="$emit('update-method', selectedMethod)" />
                <div class="option-icon">📦</div>
                <div class="option-info">
                    <strong>Thanh toán khi nhận hàng (COD)</strong>
                    <span>Khách hàng được mở hàng kiểm tra gỗ chuẩn 100% trước khi trả tiền cho shipper.</span>
                </div>
            </label>

            <!-- Phương thức 2: Chuyển khoản QR -->
            <label class="payment-option" :class="{ active: selectedMethod === 'qr' }">
                <input type="radio" value="qr" v-model="selectedMethod"
                    @change="$emit('update-method', selectedMethod)" />
                <div class="option-icon">🏦</div>
                <div class="option-info">
                    <strong>Chuyển khoản Ngân hàng (Quét mã VietQR)</strong>
                    <span>Giảm thêm 1% cho đơn hàng chuyển khoản trước. Mã QR tự điền số tiền và nội dung.</span>
                </div>
            </label>
        </div>

        <!-- Thông tin VietQR nếu chọn Chuyển khoản -->
        <div v-if="selectedMethod === 'qr'" class="qr-info-box bo-rounded">
            <p class="qr-note">💡 Mã VietQR tự động sẽ xuất hiện ngay sau khi bạn bấm <strong>"ĐẶT HÀNG NGAY"</strong>.
            </p>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'

defineEmits(['update-method'])
const selectedMethod = ref('cod')
</script>

<style scoped>
.payment-card {
    background: #ffffff;
    border: 1px solid var(--wd-line, #e8e2d9);
    padding: 24px;
    margin-top: 20px;
}

.bo-rounded {
    border-radius: 12px;
}

.form-title {
    font-size: 20px;
    color: var(--wd-wood-900, #2c1810);
    margin: 0 0 20px 0;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.payment-options {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.payment-option {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 16px;
    border: 1px solid #eee;
    border-radius: 10px;
    cursor: pointer;
    transition: border-color 0.2s, background-color 0.2s;
}

.payment-option.active {
    border-color: var(--wd-gold-600, #d4af37);
    background-color: #fbf9f6;
}

.payment-option input[type="radio"] {
    margin-top: 4px;
    accent-color: #d4af37;
}

.option-icon {
    font-size: 24px;
}

.option-info {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.option-info strong {
    font-size: 14px;
    color: var(--wd-wood-900, #2c1810);
}

.option-info span {
    font-size: 12px;
    color: #666;
    line-height: 1.4;
}

.qr-info-box {
    margin-top: 12px;
    background-color: #fcfbfa;
    border: 1px dashed var(--wd-gold-600, #d4af37);
    padding: 12px 16px;
}

.qr-note {
    font-size: 13px;
    color: #555;
    margin: 0;
}
</style>