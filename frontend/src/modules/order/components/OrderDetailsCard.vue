<template>
    <div class="order-details-card bo-rounded">
        <h3 class="card-title serif">📦 Thông tin đơn hàng</h3>

        <!-- Thông tin người nhận -->
        <div class="info-grid">
            <div class="info-item">
                <span class="label">Người nhận:</span>
                <strong>{{ order.customerName }} - {{ order.phone }}</strong>
            </div>
            <div class="info-item">
                <span class="label">Địa chỉ giao hàng:</span>
                <span>{{ order.address }}</span>
            </div>
            <div class="info-item">
                <span class="label">Hình thức thanh toán:</span>
                <span>
                    {{ order.paymentMethod === 'cod'
                        ? 'Thanh toán khi nhận hàng (COD - Được kiểm tra gỗ)' : 'Chuyểnkhoản Ngân hàng (VietQR)' }}
                </span>
            </div>
            <div class="info-item" v-if="order.note">
                <span class="label">Ghi chú phong thủy:</span>
                <span class="italic-text">"{{ order.note }}"</span>
            </div>
        </div>

        <div class="divider"></div>

        <!-- Danh sách sản phẩm -->
        <h4 class="sub-card-title">Sản phẩm đã đặt:</h4>
        <div class="purchased-items">
            <div v-for="item in order.items" :key="item.id" class="purchased-item">
                <img :src="item.image" :alt="item.name" class="item-img" />
                <div class="item-info">
                    <span class="item-name">{{ item.name }}</span>
                    <span class="item-meta">Số lượng: x{{ item.quantity }}</span>
                </div>
                <div class="item-price">{{ formatPrice(item.price * item.quantity) }}</div>
            </div>
        </div>

        <div class="divider"></div>

        <!-- Tổng tiền -->
        <div class="total-summary">
            <div class="total-row">
                <span>Tổng tiền thanh toán:</span>
                <span class="final-price red-bold">{{ formatPrice(order.total) }}</span>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    order: { type: Object, required: true }
})

const formatPrice = (val) => val.toLocaleString('vi-VN') + 'đ'
</script>

<style scoped>
.bo-rounded {
    border-radius: 12px;
}

.order-details-card {
    background: #ffffff;
    border: 1px solid var(--wd-line, #e8e2d9);
    padding: 24px;
}

.card-title {
    font-size: 20px;
    color: var(--wd-wood-900, #2c1810);
    margin: 0 0 16px 0;
}

.info-grid {
    display: flex;
    flex-direction: column;
    gap: 10px;
    font-size: 14px;
    color: #444;
}

.info-item .label {
    color: #777;
    display: inline-block;
    width: 160px;
}

.italic-text {
    font-style: italic;
    color: #555;
}

.divider {
    height: 1px;
    background: #eee;
    margin: 16px 0;
}

.sub-card-title {
    font-size: 15px;
    color: var(--wd-wood-900, #2c1810);
    margin: 0 0 12px 0;
}

.purchased-items {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.purchased-item {
    display: flex;
    align-items: center;
    gap: 12px;
}

.item-img {
    width: 50px;
    height: 50px;
    object-fit: contain;
    border-radius: 6px;
    background: #fbf9f6;
    border: 1px solid #eee;
}

.item-info {
    flex: 1;
}

.item-name {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #2c1810;
}

.item-meta {
    font-size: 12px;
    color: #888;
}

.item-price {
    font-size: 14px;
    font-weight: 600;
    color: #333;
}

.total-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 16px;
    font-weight: 600;
}

.red-bold {
    color: #d9381e;
    font-weight: bold;
}

.final-price {
    font-size: 22px;
}

@media (max-width: 600px) {
    .info-item .label {
        width: 100%;
        display: block;
        margin-bottom: 2px;
    }
}
</style>