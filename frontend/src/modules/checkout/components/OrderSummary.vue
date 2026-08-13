<template>
    <div class="summary-card bo-rounded">
        <h2 class="summary-title serif">Đơn hàng của bạn ({{ items.length }})</h2>

        <!-- Danh sách sản phẩm thu gọn -->
        <div class="checkout-items-list">
            <div v-for="item in items" :key="item.id" class="checkout-item">
                <div class="item-thumb">
                    <img :src="item.image" :alt="item.name" />
                    <span class="item-qty">{{ item.quantity }}</span>
                </div>
                <div class="item-detail">
                    <h4 class="item-name capitalize">{{ item.name }}</h4>
                    <span class="item-sku">SKU: {{ item.sku }}</span>
                </div>
                <div class="item-price">
                    {{ formatPrice(item.price * item.quantity) }}
                </div>
            </div>
        </div>

        <div class="summary-divider"></div>

        <!-- Tóm tắt số tiền -->
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

        <div class="summary-divider"></div>

        <div class="summary-row total-row">
            <span>TỔNG CỘNG:</span>
            <span class="total-price red-bold">{{ formatPrice(total) }}</span>
        </div>

        <!-- Nút Đặt Hàng -->
        <button @click="$emit('submit-order')" class="btn-submit-order bo-rounded" :disabled="isSubmitting">
            {{ isSubmitting ? 'ĐANG XỬ LÝ ĐƠN HÀNG...' : '🔴 ĐẶT HÀNG NGAY' }}
        </button>

        <!-- Khối Cam kết -->
        <div class="trust-commitments">
            <div class="commit-item">
                <span class="icon">🛡️</span>
                <span>Cam kết gỗ tự nhiên 100%, đền 200% nếu giả</span>
            </div>
            <div class="commit-item">
                <span class="icon">📦</span>
                <span>Mở hộp kiểm tra & đồng kiểm cùng shipper</span>
            </div>
            <div class="commit-item">
                <span class="icon">📞</span>
                <span>Hotline hỗ trợ: <strong>0988.000.000</strong></span>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    items: { type: Array, required: true },
    subtotal: { type: Number, required: true },
    discount: { type: Number, default: 0 },
    total: { type: Number, required: true },
    isSubmitting: { type: Boolean, default: false }
})

defineEmits(['submit-order'])

const formatPrice = (val) => val.toLocaleString('vi-VN') + 'đ'
</script>

<style scoped>
.summary-card {
    background: #ffffff;
    border: 1px solid var(--wd-line, #e8e2d9);
    padding: 24px;
    position: sticky;
    top: 20px;
}

.bo-rounded {
    border-radius: 12px;
}

.summary-title {
    font-size: 20px;
    color: var(--wd-wood-900, #2c1810);
    margin: 0 0 16px 0;
}

.checkout-items-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
    max-height: 280px;
    overflow-y: auto;
    padding-right: 4px;
}

.checkout-item {
    display: flex;
    align-items: center;
    gap: 12px;
}

.item-thumb {
    position: relative;
    width: 54px;
    height: 54px;
    border-radius: 6px;
    background: #fbf9f6;
    border: 1px solid #eee;
    flex-shrink: 0;
}

.item-thumb img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.item-qty {
    position: absolute;
    top: -6px;
    right: -6px;
    background: var(--wd-wood-900, #2c1810);
    color: #fff;
    font-size: 11px;
    font-weight: bold;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.item-detail {
    flex: 1;
}

.item-name {
    font-size: 13px;
    font-weight: 600;
    color: #2c1810;
    margin: 0 0 2px 0;
    line-height: 1.3;
}

.item-sku {
    font-size: 11px;
    color: #888;
}

.item-price {
    font-size: 13px;
    font-weight: 600;
    color: #333;
}

.summary-divider {
    height: 1px;
    background: #eee;
    margin: 16px 0;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    margin-bottom: 10px;
    color: #444;
}

.free-ship {
    color: #2e7d32;
    font-weight: 600;
    font-size: 13px;
}

.discount-text {
    color: #2e7d32;
    font-weight: 600;
}

.total-row {
    font-size: 16px;
    font-weight: 700;
    color: var(--wd-wood-900, #2c1810);
}

.total-price {
    font-size: 22px;
    color: #d9381e;
}

.btn-submit-order {
    width: 100%;
    height: 52px;
    background: #d9381e;
    color: #ffffff;
    border: none;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    margin-top: 16px;
    transition: background 0.2s;
}

.btn-submit-order:hover {
    background: #b52b14;
}

.btn-submit-order:disabled {
    background: #ccc;
    cursor: not-allowed;
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