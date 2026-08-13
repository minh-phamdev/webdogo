<template>
    <div class="qr-payment-card bo-rounded">
        <h3 class="card-title serif">💳 Thông tin chuyển khoản qua VietQR</h3>
        <p class="qr-desc">
            Vui lòng quét mã QR dưới đây hoặc chuyển khoản theo đúng nội dung để hệ thống tự động xác nhận đơn hàng.
        </p>

        <div class="qr-grid">
            <!-- Ảnh QR tự tạo qua VietQR API -->
            <div class="qr-image-box">
                <img :src="qrImageUrl" alt="Mã VietQR Thanh Toán" />
                <span class="scan-tip">Quét bằng ứng dụng Ngân hàng / Momo</span>
            </div>

            <!-- Thông tin TK ngân hàng -->
            <div class="bank-details">
                <div class="detail-row">
                    <span>Ngân hàng:</span>
                    <strong>{{ bankInfo.bankName }}</strong>
                </div>
                <div class="detail-row">
                    <span>Số tài khoản:</span>
                    <strong class="gold-text">{{ bankInfo.accountNo }}</strong>
                </div>
                <div class="detail-row">
                    <span>Chủ tài khoản:</span>
                    <strong>{{ bankInfo.accountName }}</strong>
                </div>
                <div class="detail-row">
                    <span>Số tiền:</span>
                    <strong class="red-bold">{{ formatPrice(total) }}</strong>
                </div>
                <div class="detail-row content-row">
                    <span>Nội dung CK:</span>
                    <div class="copy-box">
                        <strong class="code-text">{{ orderCode }}</strong>
                        <button @click="copyContent(orderCode)" class="btn-copy">📋 Sao chép</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    orderCode: { type: String, required: true },
    total: { type: Number, required: true }
})

const bankInfo = {
    bankId: 'MB',
    accountNo: '999988886666',
    accountName: 'CTY TNHH DO GO ANH KHOA',
    bankName: 'MBBank (Ngân hàng Quân Đội)'
}

const qrImageUrl = computed(() => {
    return `https://img.vietqr.io/image/${bankInfo.bankId}-${bankInfo.accountNo}-compact2.png?amount=${props.total}&addInfo=${props.orderCode}&accountName=${encodeURIComponent(bankInfo.accountName)}`
})

const formatPrice = (val) => val.toLocaleString('vi-VN') + 'đ'

const copyContent = (text) => {
    navigator.clipboard.writeText(text)
    alert(`Đã sao chép nội dung: ${text}`)
}
</script>

<style scoped>
.bo-rounded {
    border-radius: 12px;
}

.qr-payment-card {
    background: #ffffff;
    border: 2px dashed var(--wd-gold-600, #d4af37);
    padding: 24px;
}

.card-title {
    font-size: 20px;
    color: var(--wd-wood-900, #2c1810);
    margin: 0 0 8px 0;
}

.qr-desc {
    font-size: 13px;
    color: #666;
    margin: 0 0 20px 0;
}

.qr-grid {
    display: flex;
    gap: 24px;
    align-items: center;
}

.qr-image-box {
    width: 200px;
    text-align: center;
    flex-shrink: 0;
}

.qr-image-box img {
    width: 100%;
    border-radius: 8px;
    border: 1px solid #eee;
}

.scan-tip {
    display: block;
    font-size: 11px;
    color: #888;
    margin-top: 6px;
}

.bank-details {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    color: #444;
}

.gold-text {
    color: #b8860b;
    font-size: 16px;
}

.red-bold {
    color: #d9381e;
    font-size: 16px;
    font-weight: bold;
}

.copy-box {
    display: flex;
    align-items: center;
    gap: 8px;
}

.code-text {
    background: #f5f5f5;
    padding: 2px 8px;
    border-radius: 4px;
    color: #d9381e;
}

.btn-copy {
    background: #2c1810;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 2px 8px;
    font-size: 12px;
    cursor: pointer;
}

@media (max-width: 600px) {
    .qr-grid {
        flex-direction: column;
    }
}
</style>